<?php

namespace App\Http\Controllers\RawatInap;

use DB;
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
                        ->join('daftar_rawat_inap','daftar_rawat_jalan.id','=','daftar_rawat_inap.id_transaksi_rawat_jalan')
                        ->select('pasien.*','pasien.id as id_pasien','daftar_rawat_jalan.*','daftar_rawat_jalan.id as id_rawat_jalan','poli.*','diagnosa.*', 'dokter.*','daftar_rawat_inap.*', 'daftar_rawat_inap.id as id_rawat_inap')
                        ->where('daftar_rawat_inap.status','=',0)
                        ->get(); 
        $data = [];
        foreach($daftar as $rawatJalan) {
            $data[] = [
                'id' => $rawatJalan->id_rawat_jalan,
                'id_rawat_inap' => $rawatJalan->id_rawat_inap,
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
            <a href="'.route('rawatJalan.detailPasien', $data['id']).'" ><button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm detail-rawatJalan"><b><i class="icon-pencil5"></i></b>Detail</button></a>
            <button type="button" id="'.$data['id_rawat_inap'].'" class="btn btn-primary btn-labeled btn-labeled-left btn-sm ranip-invoice"><b><i class="icon-pencil5"></i></b>Invoice</button>
          
            ';
        })
        ->rawColumns(['tindakan'])
        ->addIndexColumn()
        ->make(true);
    }
    
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('rawatinap.transaksi', ['menus' => $menus]);
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

    public function invoice(Request $req) {
        DB::table('daftar_rawat_inap')
            ->where('id', $req['id'])
            ->update(['status' => 1]);
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
