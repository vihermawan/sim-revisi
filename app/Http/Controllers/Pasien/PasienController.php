<?php

namespace App\Http\Controllers\Pasien;

use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Icd;
use App\Poli;
use App\Dokter;
use App\DaftarRawatJalan;
use App\Pasien;
use Redirect;
use Yajra\Datatables\Datatables;
use App\Helpers\FunctionHelper;
use Illuminate\Support\Facades\DB;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pasienJSON() {
        $pasien = Pasien::orderBy('id', 'asc')->get();
        $data = [];
        foreach($pasien as $pasiens) {
            $data[] = [
                'id' => $pasiens->id,
                'nama_pasien' => $pasiens->nama_pasien,
                'jenis_kelamin' => $pasiens->jenis_kelamin,
                'tanggal_lahir' => $pasiens->tanggal_lahir,
                'status' => $pasiens->status,
                'alamat' => $pasiens->alamat,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <a href="'.route('pasien.rekamMedisPasien', $data['id']).'" ><button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm daftar-rawatjalan"><b><i class="icon-database2"></i></b>Rekam Medis</button></a>
                <a href="'.route('pasien.detailPasien', $data['id']).'" ><button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm daftar-rawatjalan"><b><i class="icon-pencil5"></i></b>Detail</button></a>
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

        $pasien = Pasien::orderBy('id', 'asc')->get();

        $pasiens = DB::table('pasien')
                ->select('pasien.*')
                ->get();
                
        return view('pasien.pasien', ['pasien' => $pasien, 'menus' => $menus, 'pasiens' => $pasiens]);
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

    public function detailPasien(Request $req) {
        $pasien = Pasien::find($req->id);

        $rawatJalan = DB::table('pasien')
                        ->select('pasien.id as id_pasien')
                        ->where('pasien.id','=' ,$req['id'])
                        ->first(); 
        $menus = FunctionHelper::callMenu();
        return view('pasien.edit', ['menus' => $menus, 'pasien' => $pasien,]);
    }

    public function rekamMedisPasien(Request $req){
        $pasien = Pasien::find($req->id);

        $rawatJalan = DB::table('daftar_rawat_jalan')
        ->join('pasien','daftar_rawat_jalan.id_pasien','=','pasien.id')
        ->join('poli','daftar_rawat_jalan.id_poli', '=', 'poli.id')
        ->join('dokter','daftar_rawat_jalan.id_dokter','=','dokter.id')
        ->join('diagnosa','daftar_rawat_jalan.id_diagnosa','=','diagnosa.id')
        ->join('icd','daftar_rawat_jalan.id_icd','=','icd.id')
        ->select('daftar_rawat_jalan.*', 'daftar_rawat_jalan.id as id_rawat_jalan', 'pasien.*', 'pasien.id as id_pasien')
        ->where('daftar_rawat_jalan.id','=' ,$req['id'])
        ->first(); 

        $poli     = Poli::all();
        $dokter   = Dokter::all();
        $icd      = Icd::all();
        $menus = FunctionHelper::callMenu();
        return view('pasien.rekammedis', [
                                'icd' => $icd,
                                'poli' => $poli,
                                'dokter'=> $dokter,
                                'menus' => $menus,
                                'pasien' => $pasien,
                                'rawatJalan' => $rawatJalan, 
                            ]);
    }

    public function rekmedTransaksiJSON() {
        $pasieninap = DB::table('transaksi_rawat_inap')
                    ->join('daftar_rawat_inap','transaksi_rawat_inap.id_daftar_rawat_inap','=','daftar_rawat_inap.id')
                    ->join('ruang','daftar_rawat_inap.id_ruang','=','ruang.id')
                    ->join('transaksi_rawat_jalan','daftar_rawat_inap.id_transaksi_rawat_jalan','=','transaksi_rawat_jalan.id')
                    ->join('daftar_rawat_jalan','transaksi_rawat_jalan.id_daftar_rawat_jalan','=','daftar_rawat_jalan.id')
                    ->join('pasien','daftar_rawat_jalan.id_pasien','=','pasien.id')
                    ->join('poli','daftar_rawat_jalan.id_poli', '=', 'poli.id')
                    ->join('dokter','daftar_rawat_jalan.id_dokter','=','dokter.id')
                    ->join('diagnosa','daftar_rawat_jalan.id_diagnosa','=','diagnosa.id')
                    ->join('icd','daftar_rawat_jalan.id_icd','=','icd.id')
                    ->select('transaksi_rawat_inap.*','transaksi_rawat_inap.id as id_transaksi_rawat_inap','daftar_rawat_inap.*','transaksi_rawat_jalan.*','daftar_rawat_jalan.*','pasien.*','pasien.id as id_pasien','poli.*','icd.*','dokter.*','diagnosa.*','ruang.*')
                    ->get(); 

        $data = [];
        foreach($pasieninap as $info) {
            $data[] = [
                'tanggal_kunjungan' => $info->tanggal_kunjungan,
                'nama_poli' => $info->nama_poli,
                'nama_ruang' => $info->nama_ruang,
                'tanggal_lahir' => $info->tanggal_lahir,
                'status' => $info->status,
                'alamat' => $info->alamat,
            ];
        }
        return Datatables::of($data)
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
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
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $req)
    {
        $pasien = Pasien::find($req->id);
        $pasien->nama_pasien        = $req->formData[0]["value"];
        $pasien->jenis_kelamin      = $req->formData[1]["value"];
        $pasien->alamat             = $req->formData[2]["value"];
        $pasien->provinsi           = $req->formData[3]["value"];
        $pasien->kabupaten          = $req->formData[4]["value"];
        $pasien->kecamatan          = $req->formData[5]["value"];
        $pasien->desa               = $req->formData[6]["value"];
        $pasien->golongan_darah     = $req->formData[7]["value"];
        $pasien->status             = $req->formData[8]["value"];
        $pasien->tempat_lahir       = $req->formData[9]["value"];
        $pasien->umur               = $req->formData[10]["value"];
        $pasien->tanggal_lahir      = $req->formData[11]["value"];
        $pasien->pekerjaan          = $req->formData[12]["value"];
        $pasien->pendidikan         = $req->formData[13]["value"];
        $pasien->agama              = $req->formData[14]["value"];
      
        $pasien->save();
        return $req;
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
            return Pasien::destroy($req->id);
         }
    }
}
