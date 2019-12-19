<?php

namespace App\Http\Controllers\RawatInap;

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
}
