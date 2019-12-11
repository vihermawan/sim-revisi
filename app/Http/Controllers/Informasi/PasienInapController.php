<?php

namespace App\Http\Controllers\Informasi;

use App\Pasien;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class PasienInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function informasipasienJSON() {
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
        foreach($pasieninap as $informasi) {
            $data[] = [
                'id_transaksi_rawat_inap' => $informasi->id_transaksi_rawat_inap,
                'nama_ruang' => $informasi->nama_ruang,
                'id_pasien' => $informasi->id_pasien,
                'nama_pasien' => $informasi->nama_pasien,
                'alamat' => $informasi->alamat,
            ];
        }
        return Datatables::of($data)
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }


    public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('informasi.pasienrawatinap', ['menus' => $menus]);
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
