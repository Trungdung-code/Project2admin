<?php

namespace App\Exports;

use App\Models\Grade2Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class Grade2Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
    {
        //Neu flag = true tai xuong sample.xlsx
        $this->idStudent = $id;
    }

    public function collection()
    {
        return Grade2Model::join('student','grades.idStudent','=','student.idStudent')
        ->join('subject','subject.idSub','=','grades.idSub')
        ->where('grades.idStudent',$this->idStudent)
        ->select(
            'grades.idStudent',
            'student.name',
            'subject.nameSub',
            'grades.Skill1',
            'grades.Final1',
            'grades.Skill2',
            'grades.Final2'
        )
        ->get();
    }

    public function headings(): array
    {
        return [
            'IDSV', 'Họ tên', 'Môn', 'Thực Hành', 'Lý thuyết', 'Thực hành thi lại', 'Lý thuyết thi lại'
        ];
    }
}
