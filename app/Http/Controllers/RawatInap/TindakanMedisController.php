<?php

namespace App\Http\Controllers\RawatInap;

use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\Controller;

class TindakanMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('rawatinap.tindakan', ['menus' => $menus]);
    }

    public function detailTindakanJSON(Request $req)
    {
        $tindakan = DB::table('transaksi_tindakan_medis_jalan')
                        ->join('tindakan','transaksi_tindakan_medis_jalan.id_tindakan','=','tindakan.id')
                        ->join('poli','transaksi_tindakan_medis_jalan.id_poli','=','poli.id')
                        ->join('pasien','transaksi_tindakan_medis_jalan.id_pasien','=','pasien.id')
                        ->join('dokter','transaksi_tindakan_medis_jalan.id_dokter','=','dokter.id')
                        ->select('transaksi_tindakan_medis_jalan.*', 'transaksi_tindakan_medis_jalan.id as id_transaksi_tindakan_medis_jalan', 'pasien.*', 'dokter.*', 'tindakan.*', 'poli.*')
                        ->where([
                            ['transaksi_tindakan_medis_jalan.id_pasien','=' ,$req['id']],
                            ['transaksi_tindakan_medis_jalan.status_rawat','=' ,$req['status_rawat']],
                            ])
                        ->get();
                    
        $data = [];
        foreach($tindakan as $value) {
            $data[] = [
                'id' => $value->id_transaksi_tindakan_medis_jalan,
                'tanggal' => $value->tanggal_permintaan,
                'nama_dokter' => $value->nama_dokter,
                'nama_tindakan' => $value->nama_tindakan,
                'jumlah' => $value->jumlah,
                'unit' => $value->nama_poli,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <button type="button" data-id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-data-pasien" id="prosesTindakanBtn"><b><i class="icon-pencil5"></i></b> Proses</button>
                <button type="button" data-id="'.$data['id'].'" class="btn btn-primary btn-labeled btn-labeled-left btn-sm edit-data-pasien" id="editTindakanBtn"><b><i class="icon-pencil5"></i></b> Edit</button>
                <button type="button" data-id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm" id="hapusTindakan"><b><i class="icon-bin"></i></b> Hapus</button>
            ';
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

    public function rawatDataMenu(){
        $daftar = DB::table('daftar_rawat_jalan')
                        ->join('pasien','daftar_rawat_jalan.id_pasien','=','pasien.id')
                        ->join('poli','daftar_rawat_jalan.id_poli', '=', 'poli.id')
                        ->join('dokter','daftar_rawat_jalan.id_dokter','=','dokter.id')
                        ->join('diagnosa','daftar_rawat_jalan.id_diagnosa','=','diagnosa.id')
                        ->join('icd','daftar_rawat_jalan.id_icd','=','icd.id')
                        ->join('daftar_rawat_inap','daftar_rawat_jalan.id','=','daftar_rawat_inap.id_transaksi_rawat_jalan')
                        ->select('pasien.*','pasien.id as id_pasien','daftar_rawat_jalan.*','daftar_rawat_jalan.id as id_rawat_jalan','poli.*','diagnosa.*', 'dokter.*','daftar_rawat_inap.*', 'daftar_rawat_inap.id as id_rawat_inap')
                        ->where('daftar_rawat_inap.status','=',0)
                        ->get(); 
        $data = [];
        foreach($daftar as $rawatJalan) {
            $data[] = [
                'id_rawat_jalan' => $rawatJalan->id_rawat_jalan,
                'id' => $rawatJalan->id_rawat_inap,
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
            <a href="'.route('rawatInap.detailPasien', $data['id_pasien']).'" ><button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm detail-rawatJalan"><b><i class="icon-pencil5"></i></b>Detail</button></a>

            ';
        })
        ->rawColumns(['tindakan'])
        ->addIndexColumn()
        ->make(true);
    }
}
