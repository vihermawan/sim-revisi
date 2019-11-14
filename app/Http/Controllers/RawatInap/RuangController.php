<?php

namespace App\Http\Controllers\RawatInap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Ruang;
use Yajra\Datatables\Datatables;
use App\Helpers\FunctionHelper;
class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ruangJSON() {
        $ruangs = DB::table('ruang')
        ->join('kelas','ruang.id_kelas','=','kelas.id')
        ->select('ruang.*','ruang.id as id_ruang','kelas.*', 'kelas.id as id_kelas')
        ->get();  

        $data = [];
        foreach($ruangs as $ruang) {
            $data[] = [
                'id' => $ruang->id_ruang,
                'nama_ruang' => $ruang->nama_ruang,
                'nama_kelas' => $ruang->nama_kelas,
                'status_ruang' => $ruang->status_ruang
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
                            <a href="#" id="'.$data['id'].'" class="dropdown-item edit-ruangan-data " data-toggle="modal" data-target="#edit-modal"><i class="icon-file-excel"></i>Edit</a>
                            <a href="#" id="'.$data['id'].'" class="dropdown-item delete-ruang-data" data-toggle="modal" data-target="#delete-modal"><i class="icon-file-word"></i>Delete</a>
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

        $kelass = DB::table('kelas')
        ->select('kelas.*', 'kelas.id as id_kelas')
        ->get();  

        return view('rawatinap.ruang',['kelas' => $kelass, 'menus' => $menus]);
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
        $ruang = new Ruang;
        $ruang->nama_ruang      = $req->formData[0]["value"];
        $ruang->id_kelas        = $req->formData[1]["value"];
        $ruang->status_ruang    = $req->formData[2]["value"];
        $ruang->save();
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
    public function updateData(Request $req)
    {
        $ruang = Ruang::find($req->id);
        $ruang->id_kelas =  $req->formData[0]["value"];
        $ruang->status_ruang =  $req->formData[1]["value"];
        $ruang->save();
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
            return Ruang::destroy($req->id);
         }
    }
}
