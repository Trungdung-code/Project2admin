<?php

namespace App\Imports;

use App\Models\GradeModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GradeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $data = [
            "idStudent" => $row["id_sv"],
            "name" => $row["ho_ten"],
            "idSub" => SubjectModel::where('nameSub',$row["mon"])->value("idSub"),
            "Skill1" => $row["thuc_hanh"],
            "Final1" => $row["ly_thuyet"],
        ];
        return new GradeModel($data);
    }
}
