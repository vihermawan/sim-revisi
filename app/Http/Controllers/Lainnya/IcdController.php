<?php

namespace App\Http\Controllers\Lainnya;

use App\Icd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\FunctionHelper;
use Yajra\Datatables\Datatables;
class IcdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function icdJSON() {
        $icds = DB::table('icd')
        ->select('icd.*','icd.id as id_icd')
        ->get();

        $data = [];
        foreach($icds as $icd) {
            $data[] = [
                'id' => $icd-> id_icd,
                'nama_icd' => $icd -> nama_icd
            ];
        }
    return Datatables::of($data)
    ->addColumn('action', function ($data){
        return'
        <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-icd-data" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Edit</button>
        <button type="button" id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm delete-icd-data" data-toggle="modal" data-target="#delete-modal"><b><i class="icon-bin"></i></b> Delete</button>
    ';
    })
    ->rawColumns(['action'])
    ->addIndexColumn()
    ->make(true);
} 

    public function index()
    {
        $menus = FunctionHelper::callMenu();
        $icd = DB::table('icd')
        ->select('icd.*','icd.id as id_icd')
        ->get();

        return view('lainnya.icd', ['icd' => $icd, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $icd = new Icd();
        $icd ->nama_icd = $request->formData[0]["value"];
        $icd->save();


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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $icd = Icd::find($request->id);
        $icd->nama_icd =  $request->formData[0]["value"];
        $icd->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if( $req->ajax()) {
            return Icd::destroy($req-> id);
        }
    }
}
