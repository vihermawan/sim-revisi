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
                        ->where('rekam_medis.status_rawat', '=', $req['status_rawat'])
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
                <button type="button" data-id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-data-pasien" id="editRekmedBtn"><b><i class="icon-pencil5"></i></b> Edit</button>
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
        return $req;
    
    }
    public function editRM(Request $req)
    {
        $daftar = RekamMedis::find($req['id']);
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
    public function editDataRM(Request $req)
    {
        return RekamMedis::find($req['id']);
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

    public function rawatDataMenu(){

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
            <a href="'.route('rawatJalan.detailPasien', $data['id']).'#rekam-medis" ><button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm daftar-rawatjalan"><b><i class="icon-pencil5"></i></b>Detail</button></a>
            ';
        })
        ->rawColumns(['tindakan'])
        ->addIndexColumn()
        ->make(true);
   
    }

}