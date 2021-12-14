<?php

namespace App\Exports;

use App\Models\GradeModel;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GradeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($flag = false)
    {
        //Neu flag = true tai xuong sample.xlsx
        $this->flag = $flag;
    }

    public function collection()
    {
        if ($this->flag) return new Collection([]);
        return GradeModel::all();
    }

    public function headings(): array
    {
        if ($this->flag) return ['ID SV', 'Họ tên', 'Môn', 'Thực Hành', 'Lý Thuyết'];
        return [
            'ID SV', 'Họ tên', 'Môn', 'Thực Hành', 'Lý Thuyết'
        ];
    }
}
