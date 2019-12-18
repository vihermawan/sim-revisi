<?php

namespace App\Http\Controllers\Lainnya;

use Illuminate\Http\Request;
use App\Dokter;
use App\Perawat;
use Redirect;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\FunctionHelper;

class PerawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function perawatJSON()
    {
        $perawats = DB::table('perawat')
        ->join('dokter', 'perawat.id_dokter','=','dokter.id')
        ->select('perawat.*','perawat.id as id_perawat','dokter.*','dokter.id as id_dokter')
        ->get();  

        $data = [];
        foreach($perawats as $perawat) {
            $data[] = [
                'id' => $perawat->id_perawat,
                'nama_perawat' => $perawat->nama_perawat,
                'nama_dokter' => $perawat->nama_dokter,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
            <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-data-perawat" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Edit</button>
            <button type="button" id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm delete-modal" data-toggle="modal" data-target="#delete-modal"><b><i class="icon-bin"></i></b> Delete</button>
        ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    } 

    public function index()
    {
        $menus = FunctionHelper::callMenu();
        $perawats = DB::table('perawat')
        ->join('dokter', 'perawat.id_dokter','=','dokter.id')
        ->select('perawat.*','perawat.id as id_perawat','dokter.*','dokter.id as id_dokter')
        ->get();  

       
        return view('lainnya.perawat', ['menus' => $menus, 'perawats' => $perawats]);
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
    public function store(Request $req)
    {
            $perawat = new Perawat;
            $perawat->nama_perawat = $req->formData[0]["value"];
            $perawat->id_dokter = $req->formData[1]["value"];
            $perawat->save();
            return $req;
    
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
    public function update(Request $req)
    {
        $perawat = Perawat::find($req->id);
        $perawat->nama_perawat =   $req->formData[0]["value"];
        $perawat->nama_dokter =  $req->formData[1]["value"];
        $perawat->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if ($req->ajax()) {
            return Perawat::destroy($req->id);
         }
    }
}
