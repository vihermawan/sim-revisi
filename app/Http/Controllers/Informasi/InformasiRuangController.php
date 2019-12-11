<?php

namespace App\Http\Controllers\Informasi;

use App\Ruang;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class InformasiRuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function informasiruangJSON() {
        $informasi = DB::table('ruang')
                    ->select('ruang.*')
                    ->get();  
        $data = [];
        foreach($informasi as $ruang) {
            $data[] = [
                'id' => $ruang->id,
                'kode_ruang' => $ruang->kode_ruang,
                'nama_ruang' => $ruang->nama_ruang,
                'status_ruang' => $ruang->status_ruang,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <a href="'.route('pasien.detailPasien', $data['id']).'" ><button type="button" id="'.$data['id'].'" class="btn btn-success btn-labeled btn-labeled-left btn-sm daftar-rawatjalan"><b><i class="icon-pencil5"></i></b>Daftar</button></a>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
 
 
     
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('informasi.informasiruang', ['menus' => $menus]);
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
