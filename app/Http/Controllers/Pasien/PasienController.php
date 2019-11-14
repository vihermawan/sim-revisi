<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pasien;
use Redirect;
use Yajra\Datatables\Datatables;
use App\Helpers\FunctionHelper;
use Illuminate\Support\Facades\DB;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pasienJSON() {
        $pasien = Pasien::orderBy('id', 'asc')->get();
        $data = [];
        foreach($pasien as $pasiens) {
            $data[] = [
                'id' => $pasiens->id,
                'nama_pasien' => $pasiens->nama_pasien,
                'jenis_kelamin' => $pasiens->jenis_kelamin,
                'alamat' => $pasiens->alamat,
                'status' => $pasiens->status,
                'agama' => $pasiens->agama,
                'umur' => $pasiens->umur,
                'pendidikan' => $pasiens->pendidikan,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <div class="list-icons">
                    <a href="#" id="'.$data['id'].'" class="dropdown-item edit-data-pasien" data-toggle="modal" data-target="#edit-modal"><button type="button" class="btn btn-primary"> <i class="icon-pencil5 mr-2"></i> Edit </button></a>
                    <a href="#" id="'.$data['id'].'" class="dropdown-item delete-modal" data-toggle="modal" data-target="#delete-modal"><button type="button" class="btn btn-danger"> <i class="icon-trash mr-2"></i> Delete </button></i></a>
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

        $pasien = Pasien::orderBy('id', 'asc')->get();
        return view('pasien.pasien', ['pasien' => $pasien, 'menus' => $menus]);
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
    public function updateData(Request $req)
    {
        $pasien = Pasien::find($req->id);
        $pasien->nama_pasien        = $req->formData[0]["value"];
        $pasien->jenis_kelamin      = $req->formData[1]["value"];
        $pasien->alamat             = $req->formData[2]["value"];
        $pasien->provinsi           = $req->formData[3]["value"];
        $pasien->kabupaten          = $req->formData[4]["value"];
        $pasien->kecamatan          = $req->formData[5]["value"];
        $pasien->desa               = $req->formData[6]["value"];
        $pasien->golongan_darah     = $req->formData[7]["value"];
        $pasien->status             = $req->formData[8]["value"];
        $pasien->tempat_lahir       = $req->formData[9]["value"];
        $pasien->umur               = $req->formData[10]["value"];
        $pasien->tanggal_lahir      = $req->formData[11]["value"];
        $pasien->pekerjaan          = $req->formData[12]["value"];
        $pasien->pendidikan         = $req->formData[13]["value"];
        $pasien->agama              = $req->formData[14]["value"];
      
        $pasien->save();
        return $req;
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
            return Pasien::destroy($req->id);
         }
    }
}
