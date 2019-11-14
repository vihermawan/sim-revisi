<?php

namespace App\Http\Controllers\Pendaftaran;

use Illuminate\Http\Request;
use App\Pasien;
use App\Daftar;
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

    public function pendaftaranJSON() {
        $daftar = DB::table('daftar')
                       ->join('poli','daftar.id_poli','=','poli.id')
                       ->join('role_pembayaran','daftar.id_role_pembayaran', '=', 'role_pembayaran.id')
                       ->join('pasien','daftar.id_pasien','=','pasien.id')
                       ->join('users','daftar.id_user','=','users.id')
                       ->select('daftar.id as id_daftar','poli.*','role_pembayaran.*','pasien.*','daftar.*','users.*')
                       ->get();  

        $data = [];
        foreach($daftar as $pendaftaran) {
            $data[] = [
                'id' => $pendaftaran->id_daftar,
                'tanggal_kunjungan' => $pendaftaran->tanggal_kunjungan,
                'nama_pasien' => $pendaftaran->nama_pasien,
                'nama_poli' => $pendaftaran->nama_poli,
                'jenis_kelamin' => $pendaftaran->jenis_kelamin,
                'id_role_pembayaran' => $pendaftaran->id_role_pembayaran,
                'nama_user' => $pendaftaran->nama_user
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <div class="list-icons">
                    <a href="#" id="'.$data['id'].'" class="dropdown-item edit-data-pendaftaran" data-toggle="modal" data-target="#edit-modal"><button type="button" class="btn btn-primary"> <i class="icon-pencil5 mr-2"></i> Edit </button></a>
                    <a href="#" id="'.$data['id'].'" class="dropdown-item delete-modal" data-toggle="modal" data-target="#delete-modal"><button type="button" class="btn btn-danger"> <i class="icon-trash mr-2"></i> Delete </button></i></a>
                </div>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
     
    public function index()
    {
        $menus = FunctionHelper::callMenu();

        $daftar = DB::table('daftar')
                       ->join('poli','daftar.id_poli','=','poli.id')
                       ->join('role_pembayaran','daftar.id_role_pembayaran', '=', 'role_pembayaran.id')
                       ->join('pasien','daftar.id_pasien','=','pasien.id')
                       ->select('daftar.id as id_daftar','poli.*','role_pembayaran.*','pasien.*')
                       ->get();
                        
        return view('pendaftaran.pendaftaran',['daftar' => $daftar, 'menus' => $menus]);
        // return $daftar;
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

        $e = DB::table('pasien')->get();
        foreach($e as $data){
            $daftar = new Daftar();
            $daftar->id_pasien = $data->id;          
        }
        $daftar->tanggal_kunjungan  = $req->formData[15]["value"];
        $daftar->id_poli            = $req->formData[16]["value"];
        $daftar->id_role_pembayaran = $req->formData[17]["value"];
        $daftar->id_user            = $req->formData[18]["value"];
       
        $daftar->save();
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
