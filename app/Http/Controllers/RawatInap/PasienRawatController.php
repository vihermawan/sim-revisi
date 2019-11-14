<?php

namespace App\Http\Controllers\RawatInap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\RawatInap;
use App\Pasien;
use Yajra\Datatables\Datatables;
use App\Helpers\FunctionHelper;
class PasienRawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pasienRawatJSON() {

        $pasienrawat = DB::table('rawat_inap')
            ->join('pasien','rawat_inap.id_pasien','=','pasien.id')
            ->join('users','rawat_inap.id_user', '=', 'users.id')
            ->join('ruang','rawat_inap.id_ruang','=','ruang.id')
            ->join('kelas','ruang.id_kelas','=','kelas.id')
            ->join('pemeriksaan_harian','rawat_inap.id_pemeriksaanharian','=','pemeriksaan_harian.id')
            ->select('pasien.*','ruang.*','pemeriksaan_harian.*','users.*','rawat_inap.*','rawat_inap.id as id_rawat_inap','kelas.*')
            ->get(); 

        $data = [];
        foreach($pasienrawat as $pasienrawat_new) {
            $data[] = [
                'id' => $pasienrawat_new->id_rawat_inap,
                'nama_pasien' => $pasienrawat_new->nama_pasien,
                'tanggal_masuk' => $pasienrawat_new->tanggal_masuk,
                'nama_kelas' => $pasienrawat_new->nama_kelas,
                'nama_user' =>$pasienrawat_new->nama_user
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
                            <a href="#" id="'.$data['id'].'" class="dropdown-item edit-data" data-toggle="modal" data-target="#edit-modal'.$data['id'].'"><i class="icon-file-excel"></i>Edit</a>
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
        $pasienrawat = DB::table('rawat_inap')
            ->join('pasien','rawat_inap.id_pasien','=','pasien.id')
            ->join('users','rawat_inap.id_user', '=', 'users.id')
            ->join('ruang','rawat_inap.id_ruang','=','ruang.id')
            ->join('kelas','ruang.id_kelas','=','kelas.id')
            ->join('pemeriksaan_harian','rawat_inap.id_pemeriksaanharian','=','pemeriksaan_harian.id')
            ->select('pasien.*','ruang.*','pemeriksaan_harian.*','users.*','rawat_inap.*','rawat_inap.id as id_rawat_inap','kelas.*')
            ->get();     

        return view('rawatinap.pasienrawat',['pasienrawat' => $pasienrawat, 'menus' => $menus]);
    }

    public function autocomplete(Request $req) {
        $data = Pasien::select("id","nama_pasien")
                ->where("nama_pasien","LIKE","%{$req->input('query')}%")
                ->get();
   
        return response()->json($data);
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
    public function store(Request $req)
    {
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
    public function destroy(Request $req)
    {
        if ($req->ajax()) {
            return RawatInap::destroy($req->id);
         }
    }
}
