<?php

namespace App\Http\Controllers\Pendaftaran;

use Illuminate\Http\Request;
use App\Pasien;
use App\RolePembayaran;
use Redirect;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\FunctionHelper;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function pendaftaranJSON() {
    //     $pasien = DB::table('pasien')
    //             ->select('pasien.*')
    //             ->get();  

    //     $data = [];
    //     foreach($pasien as $pasiens) {
    //         $data[] = [
    //             'id' => $pasiens->id,
    //             'no_rm' => $pasiens->id,
    //             'nama_pasien' => $pasiens->nama_pasien,
    //             'no_identitas' => $pasiens->no_identitas,
    //             'tanggal_kunjungan' => $pasiens->tanggal_kunjungan,
    //             'alamat' => $pasiens->alamat,
    //         ];
    //     }
    //     return Datatables::of($data)
    //     ->addColumn('action', function ($data){
    //         return'
    //         <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-data-pendaftaran" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Edit</button>
    //         <button type="button" id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm delete-modal" data-toggle="modal" data-target="#delete-modal"><b><i class="icon-bin"></i></b> Delete</button>
    //     ';
    //     })
    //     ->rawColumns(['action'])
    //     ->addIndexColumn()
    //     ->make(true);
    // }
     
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        $pasien = DB::table('pasien')->count();  
        $idbaru = $pasien+1;
        $kode = str_pad('0',7,"0");
        $id_pasien = $kode.$idbaru;
        return view('pendaftaran.coba',['pasien' => $pasien, 'menus' => $menus, 'id_pasien' => $id_pasien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $pasien = new Pasien;
        $pasien->id                 = $req->formData[0]["value"];
        $pasien->nama_pasien        = $req->formData[1]["value"];
        $pasien->no_identitas       = $req->formData[2]["value"];
        $pasien->jenis_kelamin      = $req->formData[3]["value"];
        $pasien->alamat             = $req->formData[4]["value"];
        $pasien->tanggal_kunjungan  = $req->formData[5]["value"];
        $pasien->propinsi           = $req->formData[6]["value"];
        $pasien->kabupaten          = $req->formData[7]["value"];
        $pasien->kecamatan          = $req->formData[8]["value"];
        $pasien->kelurahan          = $req->formData[9]["value"];
        $pasien->golongan_darah     = $req->formData[10]["value"];
        $pasien->status             = $req->formData[11]["value"];
        $pasien->tempat_lahir       = $req->formData[12]["value"];
        $pasien->umur               = $req->formData[13]["value"];
        $pasien->tanggal_lahir      = $req->formData[14]["value"];
        $pasien->pekerjaan          = $req->formData[13]["value"];
        $pasien->pendidikan         = $req->formData[16]["value"];
        $pasien->agama              = $req->formData[17]["value"];
        $pasien->nama_wali          = $req->formData[18]["value"];
      
        $pasien->save();
        return $req;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "bangsat show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "bangsat edit";
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
        $daftar = Daftar::find($req->id);
        $daftar->id_poli            =  $req->formData[0]["value"];
        $daftar->id_role_pembayaran =  $req->formData[1]["value"];
        $daftar->save();
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
            return Daftar::destroy($req->id);
         }
    }
}
