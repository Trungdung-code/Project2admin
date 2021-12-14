<?php

namespace App\Http\Controllers;

use App\Models\MajorModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listSub = DB::table('subject')
        ->join('major', 'subject.idMajor', '=', 'major.idMajor')
        ->select('subject.idSub', 'subject.nameSub', 'major.nameMajor')
        ->where('nameSub','LIKE', "%$search%")->paginate(4);
        return view('subject.index',[
            "listSub" => $listSub,
            'search' => $search,
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
        return view('subject.create',[
            "listMajor"=>$listMajor,
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
        $nameSubject = $request->get('nameSubject');
        $idMajor = $request->get('idMajor');
        $subject = new SubjectModel();
        $subject->nameSub = $nameSubject;
        $subject->idMajor = $idMajor;
        $subject->save();
        return redirect(route('subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = SubjectModel::find($id);
        $listMajor = MajorModel::all();
        return view('subject.edit',[
            'subject' => $subject,
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
        $nameSubject = $request->get('nameSubject');
        $idMajor = $request->get('idMajor');
        SubjectModel::where('idSub', $id)->update([
            'nameSub' => $nameSubject,
            'idMajor' => $idMajor
        ]);
        return redirect(route('subject.index'));
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
