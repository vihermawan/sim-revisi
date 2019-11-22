<?php

namespace App\Http\Controllers\Lainnya;
use Illuminate\Http\Request;
use App\Dokter;
use App\Poli;
use Redirect;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\FunctionHelper;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dokterJSON() {
        $dokters = DB::table('dokter')
                ->join('poli', 'dokter.id_poli','=','poli.id')
                ->select('dokter.*','dokter.id as id_dokter','poli.*','poli.id as id_poli')
                ->get();  

        $data = [];
        foreach($dokters as $dokter) {
            $data[] = [
                'id' => $dokter->id_dokter,
                'nama_dokter' => $dokter->nama_dokter,
                'waktu_buka' => $dokter->waktu_buka,
                'nama_poli' => $dokter->nama_poli,
                'hari_buka' => $dokter->hari_buka,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
            <button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm edit-data-dokter" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Edit</button>
            <button type="button" id="'.$data['id'].'" class="btn btn-warning btn-labeled btn-labeled-left btn-sm delete-modal" data-toggle="modal" data-target="#delete-modal"><b><i class="icon-bin"></i></b> Delete</button>
        ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    public function index()
    {
        $dokters = DB::table('dokter')
        ->join('poli', 'dokter.id_poli','=','poli.id')
        ->select('dokter.*','dokter.id as id_dokter','poli.*','poli.id as id_poli')
        ->get();

        $menus = FunctionHelper::callMenu();
        return view('lainnya.dokter', ['menus' => $menus, 'dokters' => $dokters]);
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
            $dokter = new Dokter;
            $dokter->nama_dokter = $req->formData[0]["value"];
            $dokter->waktu_buka = $req->formData[1]["value"];
            $dokter->id_poli = $req->formData[2]["value"];
            $dokter->hari_buka = $req->formData[3]["value"];
            $dokter->save();
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
    public function update(Request $req)
    {
        $dokter = Dokter::find($req->id);
        $dokter->nama_dokter =  $req->formData[0]["value"];
        $dokter->waktu_buka =  $req->formData[1]["value"];
        $dokter->nama_poli =  $req->formData[2]["value"];
        $dokter->hari_buka =  $req->formData[3]["value"];
        $dokter->save();
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
            return Dokter::destroy($req->id);
         }
    }
}
