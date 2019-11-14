<?php

namespace App\Http\Controllers\RawatInap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PemeriksaanHarian;
use App\Helpers\FunctionHelper;
class PemeriksaanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $menus = FunctionHelper::callMenu();
        $pemeriksaanharian = DB::table('pemeriksaan_harian')
                            ->join('pasien','pemeriksaan_harian.id_pasien','=','pasien.id')
                            ->join('users','pemeriksaan_harian.id_user','=','users.id')
                            ->join('tindakan','pemeriksaan_harian.id_tindakan','=','tindakan.id')
                            ->select('pasien.*','users.*','tindakan.*','pemeriksaan_harian.*')
                            ->get();  
        return view('rawatinap.pemeriksaanharian',['pemeriksaanharian' => $pemeriksaanharian, 'menus' => $menus]);
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
