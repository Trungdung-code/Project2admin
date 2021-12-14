<?php

namespace App\Imports;

use App\Models\Grade2Model;
use App\Models\SubjectModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Grade2Import implements ToModel , WithHeadingRow 
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
            "idSub" => SubjectModel::where('nameSub', $row["mon"])->value("idSub"),
            "Skill2" => $row["thuc_hanh"],
            "Final2" => $row["ly_thuyet"],
        ];
        return new Grade2Model($data);
    }
}
