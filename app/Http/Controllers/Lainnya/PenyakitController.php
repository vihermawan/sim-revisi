<?php

namespace App\Http\Controllers\Lainnya;

use App\Penyakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\FunctionHelper;
use Yajra\Datatables\Datatables;
class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function penyakitJSON() {
        $penyakits = DB::table('penyakit')
        ->select('penyakit.*','penyakit.id as id_penyakit')
        ->get();

        $data = [];
        foreach($penyakits as $penyakit) {
            $data[] = [
                'id' => $penyakit-> id_penyakit,
                'nama_penyakit' => $penyakit -> nama_penyakit,
                'jenis_penyakit' => $penyakit -> jenis_penyakit
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
                            <a href="#" id="'.$data['id'].'" class="dropdown-item edit-penyakit-data " data-toggle="modal" data-target="#edit-modal"><i class="icon-file-excel"></i>Edit</a>
                            <a href="#" id="'.$data['id'].'" class="dropdown-item delete-penyakit-data" data-toggle="modal" data-target="#delete-modal"><i class="icon-file-word"></i>Delete</a>
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
        $penyakit = DB::table('penyakit')
        ->select('penyakit.*','penyakit.id as id_penyakit')
        ->get();

        return view('lainnya.penyakit', ['penyakit' => $penyakit, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penyakit = new Penyakit();
        $penyakit ->nama_penyakit = $request->formData[0]["value"];
        $penyakit ->jenis_penyakit = $request->formData[1]["value"];
        $penyakit->save();


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
    public function update(Request $request)
    {
        $penyakit = Penyakit::find($request->id);
        $penyakit->nama_penyakit =  $request->formData[0]["value"];
        $penyakit->jenis_penyakit =  $request->formData[1]["value"];
        $penyakit->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if( $req->ajax()) {
            return Penyakit::destroy($req-> id);
        }
    }
}
