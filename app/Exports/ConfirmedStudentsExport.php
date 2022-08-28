<?php

namespace App\Exports;

use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ConfirmedStudentsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection(): Collection
    {
        return Student::confirmed()->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            '@QRCode',
        ];
    }

    public function map($student): array
    {
        return [
            $student->full_name,
            $student->hash,
        ];
    }

    public function prepareRows(array $rows)
    {
        return collect($rows)->transform(function ($student) {
            $student->hash .= '.png';

            return $student;
        });
    }
}
