<?php

namespace App\Exports;

use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromCollection, WithHeadings, WithMapping
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
        return StudentModel::join('classroom', 'classroom.idClass', '=', 'student.idClass')
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
        if ($this->flag) return ['Họ tên', 'Giới tính', 'Ngày sinh', 'Lớp', 'Email', 'Password'];
        return [
            'IDSV', 'Họ tên', 'Email', 'Password', 'Giới tính', 'Ngày sinh', 'Lớp'
        ];
    }
}
