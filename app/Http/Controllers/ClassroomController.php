<?php

namespace App\Http\Controllers;

use App\Exports\Student2Export;
use App\Exports\StudentExport;
use App\Models\ClassModels;
use App\Models\MajorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomController extends Controller
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
            ->join('major', 'classroom.idMajor', '=', 'major.idMajor')
            ->select('classroom.idClass', 'classroom.nameClass', 'major.nameMajor')
            ->where('classroom.nameClass', 'LIKE', "%$search%")->paginate('4');
        return view('class.index', [
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
        $listMajor = MajorModel::all();
        return view('class.create', [
            "listMajor" => $listMajor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $className = $request->get('className');
        $idMajor = $request->get('idMajor');
        $class = new ClassModels();
        $class->nameClass = $className;
        $class->idMajor = $idMajor;
        $class->save();
        return redirect(route('class.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $search = $request->get('search');
        $listClass = ClassModels::join('major', 'classroom.idMajor', '=', 'major.idMajor')
            ->select('classroom.*', 'major.nameMajor')
            ->where('idClass', '=', $id)
            ->first();
        $listStudent = DB::table('student')
            ->select('student.*')
            ->where('idClass', '=', $id)
            ->where('student.name', 'LIKE', "%$search%")
            ->paginate(5);
        return view('class.view', [
            "listClass" => $listClass,
            "listStudent" => $listStudent,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = ClassModels::find($id);
        $listMajor = MajorModel::all();
        return view('class.edit', [
            'class' => $class,
            'listMajor' => $listMajor
        ]);
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
        $nameClass = $request->get('nameClass');
        $idMajor = $request->get('idMajor');
        ClassModels::where('idClass', $id)->update([
            'nameClass' => $nameClass,
            'idMajor' => $idMajor
        ]);
        return redirect(route('class.index'));
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

    public function export()
    {
        return Excel::download(new StudentExport, 'Danh sach sv.xlsx');
    }

    public function exportByIdClass(Request $request,$id){
        return Excel::download(new Student2Export($id), 'Danh sach sv.xlsx');
    }
}
