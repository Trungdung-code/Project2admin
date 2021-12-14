<?php

namespace App\Http\Controllers;

use App\Models\ClassModels;
use App\Models\GradeModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listClass = DB::table('classroom')
            ->where('classroom.nameClass', 'LIKE', "%$search%")->paginate('4');
        return view('viewgrade.index', [
            "listClass" => $listClass,
            "search" => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {       
        $student = StudentModel::find($id);
       
        $listGrade = DB::table('grades')
        ->join('subject','grades.idSub','=','subject.idSub')
        ->join('major','major.idMajor','=','subject.idMajor')
        ->where('idStudent','=',$id)
        ->get();

        //select * from grades inner JOIN subject ON subject.idSub = grades.idSub INNER JOIN major ON major.idMajor = subject.idMajor WHERE idStudent = 1

        return view('viewgrade.view', [
            'student' => $student,
            'listGrade' => $listGrade,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
