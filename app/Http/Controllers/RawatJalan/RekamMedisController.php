<?php

namespace App\Http\Controllers\RawatJalan;

use DB;
use App\RekamMedis;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detailRMJSON(Request $req){
        $rekamMedis = DB::table('rekam_medis')
                        ->join('pasien','rekam_medis.id_pasien','=','pasien.id')
                        ->join('dokter','rekam_medis.id_dokter','=','dokter.id')
                        ->join('icd','rekam_medis.id_icd','=','icd.id')
                        ->select('rekam_medis.*', 'rekam_medis.id as id_rekam_medis', 'pasien.*', 'dokter.*', 'icd.*')
                        ->where('rekam_medis.id_pasien','=' ,$req['id'])
                        ->get(); 
                    
        $data = [];
        foreach($rekamMedis as $rm) {
            $data[] = [
                'id' => $rm->id_rekam_medis,
                'tanggal' => $rm->tanggal,
                'nama_dokter' => $rm->nama_dokter,
                'nama_icd' => $rm->nama_icd,
                'diagnosa' => $rm->diagnosa,
                'anamnesa' => $rm->anamesa,
                'Rfisik' => $rm->pemeriksaan_fisik,
                'Rpenunjang' => $rm->pemeriksaan_penunjang,
                'kasus' => $rm->kasus_diagnosa
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-data-pasien" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Edit</button>
                <button type="button" data-id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm" id="hapusRM"><b><i class="icon-bin"></i></b> Hapus</button>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('rawatjalan.rekammedis', ['menus' => $menus]);
    }

    public function store(Request $req)
    {
        $daftar = new RekamMedis;
        $daftar->id_pasien = $req->formData[0]["value"];
        $daftar->status_rawat = $req->formData[1]["value"];
        $daftar->anamesa = $req->formData[2]["value"];
        $daftar->id_icd = $req->formData[3]["value"];
        $daftar->diagnosa = $req->formData[4]["value"];
        $daftar->jenis_diagnosa = $req->formData[5]["value"];
        $daftar->tanggal = $req->formData[6]["value"];
        $daftar->id_dokter = $req->formData[7]["value"];
        $daftar->kasus_diagnosa = $req->formData[8]["value"];
        $daftar->pemeriksaan_fisik = $req->formData[9]["value"];
        $daftar->pemeriksaan_penunjang = $req->formData[10]["value"];
        $daftar->catatan = $req->formData[11]["value"];
        //TODO: auth
        // $daftar->id_user =  1;
        $daftar->save();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRM(Request $req)
    {
        $data = RekamMedis::find($req['id']);
        $data->delete();
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

   
}
