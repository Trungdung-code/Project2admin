<?php

namespace App\Http\Controllers;

use App\Models\ClassModels;
use App\Models\EditGradeModel;
use App\Models\GradeModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class EditGradeController extends Controller
{
    public function index(){
        $listClass = ClassModels::all();
        $listSub = SubjectModel::all();
        $listGrade = GradeModel::all();
        return view('editgrade.index', [
            'listClass' => $listClass,
            'listSub' => $listSub,
            'listGrade' => $listGrade,
        ]);
    }

    public function getStudentsByIDClass($id)
    {
        $listStudent = StudentModel::where('idClass', $id)->get();

        return $listStudent;
    }

    public function getSubjectByIdClass($id){
        $listSub = DB::table('subject')
        ->join('major','major.idMajor','=','subject.idMajor')
        ->join('classroom','classroom.idMajor','=','major.idMajor')
        ->where('idClass','=',$id)
        ->get();
        return $listSub;
    }

    public function store(Request $request)
    {
        $idStudent = $request->get('idStudent');
        $idSub = $request->get('idSubject');
        $skill = $request->get('Skill');
        $final = $request->get('Final');
        $skillGrade = $request->get('skillGrade');
        $finalGrade = $request->get('finalGrade');
        EditGradeModel::where('idStudent', $idStudent)->where('idSub', $idSub)->update([
            "$skill" => $skillGrade,
            "$final" => $finalGrade,
        ]);
        return redirect(route('editgrade.index'))->with('success', 'Thêm điểm thành công');
    }
}
