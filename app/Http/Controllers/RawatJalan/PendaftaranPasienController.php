<?php

namespace App\Http\Controllers\RawatJalan;

use DB;
use App\Poli;
use Response;
use App\Pasien;
use App\Dokter;
use App\Diagnosa;
use App\DaftarRawatJalan;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;


class PendaftaranPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();

        $diagnosa = Diagnosa::all();
        $poli     = Poli::all();
        $dokter   = Dokter::all();
        return view('rawatjalan.pendaftaranpasien', [
                'poli' => $poli,
                'menus' => $menus,
                'dokter' => $dokter,
                'diagnosa' => $diagnosa,
        
            ]);
    }

    public function searchPasien(Request $req) {

        $pasien = Pasien::where('nama_pasien','like','%'.$req['q'].'%')     
                        ->orWhere('id','like','%'.$req['q'].'%')    
                        ->orWhere('tanggal_lahir','like','%'.$req['q'].'%')    
                        ->get();
        $data = [];
        foreach($pasien as $pasiens) {
            $data[] = [
                'id' => $pasiens->id,
                'nama_pasien' => $pasiens->nama_pasien,
                'alamat' => $pasiens->alamat,
                'tanggal_lahir' => $pasiens->tanggal_lahir,
            ];
        }
        return Datatables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function searchPoli(Request $req) {
        $dokter = Dokter::where('id_poli', $req['id'])->get();
        $data = [];
        foreach($dokter as $dokters) {
            $data[] = [
                'id' => $dokters->id,
                'nama_dokter' => $dokters->nama_dokter,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
            <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm daftar-rawatjalan"><b><i class="icon-pencil5"></i></b>Daftar</button>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);

    }

    public function daftar(Request $req) {

        $daftar = new DaftarRawatJalan;
        $daftar->id_pasien = $req->formData[0]["value"];
        $daftar->id_diagnosa = $req->formData[1]["value"];
        $daftar->id_poli = $req->formData[2]["value"];
        $daftar->tanggal_kunjungan = date('Y-m-d');
        $daftar->id_icd =  1;
        $daftar->keterangan = $req->formData[3]["value"]; ;
        $daftar->id_dokter = $req['idDokter'];
        //TODO: auth
        $daftar->id_user =  1;
        $daftar->save();
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
        //
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
