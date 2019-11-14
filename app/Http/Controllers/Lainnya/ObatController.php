<?php

namespace App\Http\Controllers\Lainnya;

use App\Obat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Helpers\FunctionHelper;
class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function obatJSON() {
        $obats = DB::table('obat')
        ->select('obat.*','obat.id as id_obat')
        ->get();

        $data = [];
        foreach($obats as $obat) {
            $data[] = [
                'id' => $obat-> id_obat,
                'nama_obat' => $obat-> nama_obat,
                'dosis_obat' => $obat -> dosis_obat,
                'harga_obat' => $obat -> harga_obat,
                'jenis_obat' => $obat -> jenis_obat,
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
                            <a href="#" id="'.$data['id'].'" class="dropdown-item edit-obat-data " data-toggle="modal" data-target="#edit-modal"><i class="icon-file-excel"></i>Edit</a>
                            <a href="#" id="'.$data['id'].'" class="dropdown-item delete-obat-data" data-toggle="modal" data-target="#delete-modal"><i class="icon-file-word"></i>Delete</a>
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
        $obat = DB::table('obat')
        ->select('obat.*','obat.id as id_obat')
        ->get();

        return view('lainnya.obat', ['obat' => $obat, 'menus' => $menus]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $obat = new Obat();
        $obat->nama_obat = $request->formData[0]["value"];
        $obat->dosis_obat = $request->formData[1]["value"];
        $obat->harga_obat = $request->formData[2]["value"];
        $obat->jenis_obat = $request->formData[3]["value"];
        $obat->save();
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
    public function update(Request $request)
    {
        $obat = Obat::find($request->id);
        $obat->nama_obat =  $request->formData[0]["value"];
        $obat->dosis_obat =  $request->formData[1]["value"];
        $obat->harga_obat =  $request->formData[2]["value"];
        $obat->jenis_obat =  $request->formData[3]["value"];
        $obat->save();
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
            return Obat::destroy($req-> id);
         }
    }
}
