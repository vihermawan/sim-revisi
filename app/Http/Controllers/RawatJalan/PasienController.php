<?php

namespace App\Http\Controllers\RawatJalan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Pemeriksaan;
use App\RawatJalan;
use App\User;
use App\Poli;
use App\Resep;
use App\Obat;
use App\Pasien;
use App\Tindakan;
use App\Helpers\FunctionHelper;
use App\Helpers\AutoCompleteHelper;
use Yajra\Datatables\Datatables;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dataJSON() {
        $rawatjalan = DB::table('rawat_jalan')
                        ->join('pasien','rawat_jalan.id_pasien','=','pasien.id')
                        ->join('users','rawat_jalan.id_user', '=', 'users.id')
                        ->join('pemeriksaan','rawat_jalan.id_pemeriksaan','=','pemeriksaan.id')
                        ->join('poli','pemeriksaan.id_poli','=','poli.id')
                        ->join('tindakan','pemeriksaan.id_tindakan','=','tindakan.id')
                        ->join('resep','pemeriksaan.id_resep','=','resep.id')
                        ->select('pasien.*','pasien.id as id_pasien','pemeriksaan.*','pemeriksaan.id as id_pemeriksaan','users.*','rawat_jalan.*','rawat_jalan.id as id_rawat_jalan','poli.*','tindakan.*','resep.*')
                        ->get();   
        
                        $data = [];
        foreach($rawatjalan as $pasien) {
            $data[] = [
                'id' => $pasien->id_rawat_jalan,
                'id_pasien' => $pasien->id_pasien,
                'id_pemeriksaan'=>$pasien->id_pemeriksaan,
                'nama_pasien' => $pasien->nama_pasien,
                'poli' => $pasien->nama_poli,
                'petugas' => $pasien->nama_user,
                'pemeriksaan' =>$pasien->nama_tindakan,
                'resep' => $pasien->nama_resep,
                'tanggal_pemeriksaan' =>$pasien->tanggal_masuk
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" id="'.$data['id'].'" data-idpemeriksaan="'.$data['id_pemeriksaan'].'" class="dropdown-item edit-modal" data-toggle="modal" data-target="#edit-modal'.$data['id'].'"><i class="icon-file-excel"></i>Edit</a>
                            <a href="#" id="'.$data['id'].'" class="dropdown-item delete-modal" data-toggle="modal" data-target="#delete-modal"><i class="icon-file-word"></i>Delete</a>
                        </div>
                    </div>
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
        $rawatjalan = DB::table('rawat_jalan')
                        ->join('pasien','rawat_jalan.id_pasien','=','pasien.id')
                        ->join('users','rawat_jalan.id_user', '=', 'users.id')
                        ->join('pemeriksaan','rawat_jalan.id_pemeriksaan','=','pemeriksaan.id')
                        ->join('poli','pemeriksaan.id_poli','=','poli.id')
                        ->join('tindakan','pemeriksaan.id_tindakan','=','tindakan.id')
                        ->join('resep','pemeriksaan.id_resep','=','resep.id')
                        ->select('pasien.*','pemeriksaan.*','users.*','rawat_jalan.*','rawat_jalan.id as id_rawat_jalan','rawat_jalan.id_user as id_petugas','poli.*','poli.id as id_poli','tindakan.*','resep.*')
                        ->get(); 
                        
        $poli = Poli::all();
        $user = User::all();
        $pemeriksaan = Pemeriksaan::with('tindakan')->get();
        $tindakan = TIndakan::all();
        $reseps = Resep::with('obat')->get();

        return view('rawatjalan.pasien',[
                                            'rawatjalan' => $rawatjalan,
                                            'users' => $user,
                                            'menus' => $menus,
                                            'poli'  => $poli,
                                            'pemeriksaan' => $pemeriksaan,
                                            'reseps' => $reseps,
                                            'tindakan' => $tindakan
                                            
                                        ]);
    }

    public function destroy(Request $req)
    {
        if ($req->ajax()) {
            return RawatJalan::destroy($req->id);
         }
    }

    public function pasienSearch(Request $req) {

        return AutoCompleteHelper::Pasien(request());
    }

    public function store(Request $req)
    {   
        $pemeriksaan = new Pemeriksaan;
        $pemeriksaan->id_poli = $req->formData[3]["value"];
        $pemeriksaan->id_tindakan = $req->formData[5]["value"];
        $pemeriksaan->id_resep = $req->formData[6]["value"];
        $pemeriksaan->id_pasien =  $req->formData[0]["value"];
        $pemeriksaan->id_user =  $req->formData[3]["value"];
        $pemeriksaan->save();

        $id_pemeriksaan = Pemeriksaan::all()->last()->id;
        $rawatJalan = new RawatJalan;       
        $rawatJalan->id_pasien =  $req->formData[0]["value"];
        $rawatJalan->id_user =  $req->formData[3]["value"];
        $rawatJalan->tanggal_masuk =  $req->formData[2]["value"];
        $rawatJalan->tanggal_keluar =  null;

        $rawatJalan->id_pemeriksaan = $id_pemeriksaan;
        $rawatJalan->save();
     
        
        return $req;
   
    }

    public function updateData(Request $req)
    {
        $rawatJalan = RawatJalan::find($req->id);
        $rawatJalan->id_pasien =  $req->formData[0]["value"];
        $rawatJalan->id_user =  $req->formData[3]["value"];
        $rawatJalan->save();
        
        $pemeriksaan = Pemeriksaan::where('id', $req->id_pemeriksaan)->first();
        $pemeriksaan->id_poli = $req->formData[2]["value"];
        $pemeriksaan->id_tindakan = $req->formData[4]["value"];
        $pemeriksaan->id_resep = $req->formData[5]["value"];
        $pemeriksaan->save();
        
        return $req;
   
    }
}
