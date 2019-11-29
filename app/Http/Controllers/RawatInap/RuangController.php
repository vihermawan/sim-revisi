<?php

namespace App\Http\Controllers\RawatInap;

use Response;
use App\Ruang;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        $ruang = DB::table('ruang')
                ->select('ruang.*')
                ->get();
        return view('rawatinap.ruang', ['menus' => $menus, 'ruang' => $ruang]);
    }

    public function ruangJSON() {
        $ruang = DB::table('ruang')
                ->select('ruang.*')
                ->get();

        $data = [];
        foreach($ruang as $ruangan) {
            $data[] = [
                'id' => $ruangan->id,
                'no_rm' => $ruangan->id,
                'kode_ruang' => $ruangan->kode_ruang,
                'nama_ruang' => $ruangan->nama_ruang,
                'status_ruang' => $ruangan->status_ruang
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
            <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-ruangan-data" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Edit</button>
            <button type="button" id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm delete-ruang-data" data-toggle="modal" data-target="#delete-modal"><b><i class="icon-bin"></i></b> Delete</button>
        ';
        })
        ->editColumn('status_ruang', function($data) {
            if ($data['status_ruang'] == 1) {
                return "Terisi";
            } else {
                return "Kosong";
            }
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
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
        $ruang = Ruang::findOrFail($id);
        return Response::json($ruang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $ruang = Ruang::findOrFail($req->id);
        $ruang->kode_ruang      =  $req->formData[0]["value"];
        $ruang->nama_ruang      =  $req->formData[1]["value"];
        $ruang->status_ruang    =  $req->formData[2]["value"];
        $ruang->save();
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
            return Ruang::destroy($req->id);
        }
    }
}
