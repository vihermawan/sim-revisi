<?php

namespace App\Http\Controllers\Lainnya;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\FunctionHelper;
use Illuminate\Support\Facades\DB;
use App\Resep;
use Yajra\Datatables\Datatables;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function resepJSON() {
        $reseps = DB::table('resep')
        ->join('obat','resep.id_obat','=','obat.id')
        ->select('resep.*','resep.id as id_resep','obat.*', 'obat.id as id_obat')
        ->get();

        $data = [];
        foreach($reseps as $resep) {
            $data[] = [
                'id' => $resep->id_resep,
                'nama_obat' => $resep->nama_obat,
                'nama_resep' => $resep->nama_resep,
                'jumlah_resep' => $resep->jumlah_resep
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
                        <a href="#" id="'.$data['id'].'" class="dropdown-item edit-resep-data " data-toggle="modal" data-target="#edit-modal"><i class="icon-file-excel"></i>Edit</a>
                        <a href="#" id="'.$data['id'].'" class="dropdown-item delete-resep-data" data-toggle="modal" data-target="#delete-modal"><i class="icon-file-word"></i>Delete</a>
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

        $obatt = DB::table('obat')
        ->select('obat.*', 'obat.id as id_obat')
        ->get();

        return view('lainnya.resep', ['obat'=> $obatt,'menus' => $menus]);

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
        $resep = new Resep;
        $resep->id_obat         = $request->formData[0]["value"];
        $resep->nama_resep      = $request->formData[1]["value"];
        $resep->jumlah_resep    = $request->formData[2]["value"];
        $resep->save();
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
        $resep = Resep::find($request->id);
        $resep->id_obat =  $request->formData[0]["value"];
        $resep->nama_resep =  $request->formData[1]["value"];
        $resep->jumlah_resep =  $request->formData[2]["value"];
        $resep->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            return Resep::destroy($request->id);
         }
    }
}
