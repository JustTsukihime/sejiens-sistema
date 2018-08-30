<?php

namespace App\Jobs;

use App\Student;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Classes\LaravelExcelWorksheet;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Writers\LaravelExcelWriter;

class GenerateQRCodeArchive implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students = Student::confirmed()->get();

        $qropt = new QROptions([
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'eccLevel'   => QRCode::ECC_H,
            'addQuietzone' => false,
            'cssClass' => 'card-img',
        ]);

        $qr = new QRCode($qropt);

        $zip = new \ZipArchive();
        $tempzipfile = tempnam(sys_get_temp_dir(), 'sej_');

        if ($zip->open($tempzipfile, \ZipArchive::CREATE) !== true) {
            return;
        }

        $zip->addFile($this->createDataSetCSV($students)['full'],'AI-data-set.csv');

        foreach ($students as $student) {
            $qrsvg = $qr->render($student->hash);
            $zip->addFromString(str_replace(' ', '.', "$student->name.$student->surname.svg"), $qrsvg);
        }


        $zip->close();

        Storage::disk('public')->putFileAs('qr-archive', new File($tempzipfile), 'qr-export-'.date('dmY.His').'.zip');

        unlink($tempzipfile);
    }

    public function createDataSetCSV(Collection $students) : array
    {
        $out = Excel::create('export-'.time(), function(LaravelExcelWriter $excel) use ($students) {
            $excel->sheet('Data', function(LaravelExcelWorksheet $sheet) use ($students) {
                foreach($students as $student) {
                    $sheet->appendRow([
                        "$student->name $student->surname",
                        "$student->name.$student->surname.svg",
                    ]);
                }
            });
        })->store('csv', false, true);

        return $out;
    }
}
