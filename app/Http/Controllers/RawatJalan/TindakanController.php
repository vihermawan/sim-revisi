<?php

namespace App\Http\Controllers\RawatJalan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\FunctionHelper;
use App\Tindakan;
use Yajra\Datatables\Datatables;
class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dataJSON() {
        $tindakans = Tindakan::All();

        $data = [];
        foreach($tindakans as $tindakan) {
            $data[] = [
                'id' => $tindakan->id,
                'nama_tindakan' => $tindakan->nama_tindakan,
                'harga_tindakan' => $tindakan->harga_tindakan,
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
                            <a href="#" id="'.$data['id'].'" class="dropdown-item edit-modal" data-toggle="modal" data-target="#edit-modal"><i class="icon-file-excel"></i>Edit</a>
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
        $tindakan = Tindakan::All();

        return view('rawatjalan.tindakan', ['tindakan' => $tindakan,'menus' => $menus]);
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
        $tindakan = new Tindakan;
        $tindakan->nama_tindakan =  $req->formData[0]["value"];
        $tindakan->harga_tindakan =  $req->formData[1]["value"];
        $tindakan->save();

        return $req;
    }
    public function updateData(Request $req)
    {
        $tindakan = Tindakan::find($req->id);
        $tindakan->nama_tindakan =  $req->formData[0]["value"];
        $tindakan->harga_tindakan =  $req->formData[1]["value"];
        $tindakan->save();
        return $req->id;
    }
    
    public function destroy(Request $req)
    {
        if ($req->ajax()) {
            return Tindakan::destroy($req->id);
         }
    }
}
