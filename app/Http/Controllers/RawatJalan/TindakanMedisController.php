<?php

namespace App\Http\Controllers\RawatJalan;

use App\TransaksiTindakanMedisRawatInap;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\Controller;

class TindakanMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $menus = FunctionHelper::callMenu();
        return view('rawatjalan.tindakan', ['menus' => $menus]);
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
        $tindakan = new TransaksiTindakanMedisRawatInap;
        $tindakan->id_pasien = $req->formData[0]["value"];
        $tindakan->status_proses = $req->formData[1]["value"];
        $tindakan->id_tindakan = $req->formData[2]["value"];
        $tindakan->jumlah = $req->formData[3]["value"];
        $tindakan->id_poli = $req->formData[4]["value"];
        $tindakan->tanggal_permintaan = $req->formData[5]["value"];
        $tindakan->id_dokter = $req->formData[6]["value"];
        $tindakan->tanggal_permintaan = $req->formData[7]["value"];
        $tindakan->save();
        return $request;
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
