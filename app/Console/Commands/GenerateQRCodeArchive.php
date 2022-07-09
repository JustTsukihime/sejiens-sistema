<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateQRCodeArchive as GeneratorJob;

class GenerateQRCodeArchive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sejiens:qr-archive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new QR code archive for export';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = GeneratorJob::dispatchNow();
        $this->info(asset('storage/'.$path));
        
        return 0;
    }
}
