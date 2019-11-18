<?php

namespace App\Http\Controllers\RawatInap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\RawatInap;
use App\Helpers\FunctionHelper;
class PasienKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $menus = FunctionHelper::callMenu();

        $pasienkeluar = DB::table('rawat_inap')
            ->join('pasien','rawat_inap.id_pasien','=','pasien.id')
            ->join('users','rawat_inap.id_user', '=', 'users.id')
            ->join('ruang','rawat_inap.id_ruang','=','ruang.id')
            ->join('kelas','ruang.id_kelas','=','kelas.id')
            ->join('pemeriksaan_harian','rawat_inap.id_pemeriksaanharian','=','pemeriksaan_harian.id')
            ->select('pasien.*','ruang.*','pemeriksaan_harian.*','users.*','rawat_inap.*','kelas.*')
            ->get();     
        return view('rawatinap.pasienkeluar',['pasienkeluar' => $pasienkeluar, 'menus' => $menus]);
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
