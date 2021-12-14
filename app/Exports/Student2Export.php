<?php

namespace App\Exports;

use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class Student2Export implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($id)
    {
        //Neu flag = true tai xuong sample.xlsx
        $this->idClass = $id;
    }

    public function collection()
    {
        return StudentModel::join('classroom', 'classroom.idClass', '=', 'student.idClass')
            ->where('classroom.idClass', $this->idClass)
            ->select(
                'idStudent',
                'name',
                'email',
                'password',
                'gender',
                'dob',
                'classroom.nameClass'
            )
            ->get();
    }

    public function map($student): array
    {
        $date = str_replace("/", "-", $student->dob);
        $data = [
            $student->idStudent,
            $student->name,
            $student->email,
            $student->password,
            $student->gender == 0 ? "Nam" : "Nu",
            date("d-m-Y", strtotime($date)),
            $student->nameClass,
        ];
        return $data;
    }

    public function headings(): array
    {
        return [
            'IDSV', 'Họ tên', 'Email', 'Password', 'Giới tính', 'Ngày sinh', 'Lớp'
        ];
    }
}
