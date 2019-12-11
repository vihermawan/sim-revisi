<?php

namespace App\Http\Controllers\Informasi;


use App\Pasien;
use App\Dokter;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class JadwalPraktekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jadwalJSON() {
        $dokter = DB::table('dokter')
                ->join('poli','dokter.id_poli','=','poli.id')
                ->select('dokter.*','dokter.id as id_dokter','poli.*','poli.id as id_poli')
                ->get();  
        $data = [];
        foreach($dokter as $jadwal) {
            $data[] = [
                'id_dokter' => $jadwal->id_dokter,
                'nama_poli' => $jadwal->nama_poli,
                'hari_buka' => $jadwal->hari_buka,
                'waktu_buka' => $jadwal->waktu_buka,
                'nama_dokter' => $jadwal->nama_dokter,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <a href="'.route('pasien.detailPasien', $data['id_dokter']).'" ><button type="button" id="'.$data['id_dokter'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm daftar-rawatjalan"><b><i class="icon-pencil5"></i></b>Daftar</button></a>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    
     public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('informasi.jadwalpraktek', ['menus' => $menus]);
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
