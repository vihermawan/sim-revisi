<?php

namespace App\Http\Controllers\RawatJalan;
use DB;
use App\Icd;
use App\Poli;
use App\Dokter;
use App\Pasien;
use App\DaftarRawatJalan;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\Controller;

class TransaksiRawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function transaksiJSON(){
        $daftar = DB::table('daftar_rawat_jalan')
                        ->join('pasien','daftar_rawat_jalan.id_pasien','=','pasien.id')
                        ->join('poli','daftar_rawat_jalan.id_poli', '=', 'poli.id')
                        ->join('dokter','daftar_rawat_jalan.id_dokter','=','dokter.id')
                        ->join('diagnosa','daftar_rawat_jalan.id_diagnosa','=','diagnosa.id')
                        ->join('icd','daftar_rawat_jalan.id_icd','=','icd.id')
                        ->select('pasien.*','pasien.id as id_pasien','daftar_rawat_jalan.*','daftar_rawat_jalan.id as id_rawat_jalan','poli.*','diagnosa.*', 'dokter.*')
                        ->get(); 
        $data = [];
        foreach($daftar as $rawatJalan) {
            $data[] = [
                'id' => $rawatJalan->id_rawat_jalan,
                'id_pasien' => $rawatJalan->id_pasien,
                'nama_pasien' => $rawatJalan->nama_pasien,
                'tanggal_lahir' => $rawatJalan->tanggal_lahir,
                'nama_dokter' => $rawatJalan->nama_dokter,
                'tanggal_kunjungan' => $rawatJalan->tanggal_kunjungan,
            ];
        }
        return Datatables::of($data)
        ->addColumn('tindakan', function ($data){
            return'
            <a href="'.route('rawatJalan.detailPasien', $data['id']).'" ><button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm daftar-rawatjalan"><b><i class="icon-pencil5"></i></b>Detail</button></a>
            ';
        })
        ->rawColumns(['tindakan'])
        ->addIndexColumn()
        ->make(true);
    }

    public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('rawatjalan.transaksi', ['menus' => $menus]);
    }

    public function detailPasien(Request $req) {
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
        return view('rawatjalan.detail', [
                                'icd' => $icd,
                                'poli' => $poli,
                                'dokter'=> $dokter,
                                'menus' => $menus,
                                'pasien' => $pasien,
                                'rawatJalan' => $rawatJalan, 
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
    public function simpan(Request $req) {

        $daftar = DaftarRawatJalan::find($req['id']);
        $daftar->id_poli = $req->formData[5]["value"];
        $daftar->id_dokter = $req->formData[4]["value"];
        $daftar->catatan = $req->formData[6]["value"];
        $daftar->alergi = $req->formData[7]["value"];
        //TODO: auth
        $daftar->id_user =  1;
        $daftar->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $data = DaftarRawatJalan::find($req['id']);
        $data->delete();

    }
}
