<?php

namespace App\Http\Controllers\Setting;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helpers\FunctionHelper;
class EditPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        $users = User::with('role')->orderBy('nama_user', 'asc')->get();
        
        return view('setting.editpassword', ['users' => $users, 'menus' => $menus]);
    }

    public function passwordJson()
    {
        $users = User::with('role')->orderBy('nama_user', 'asc')->get();

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'nama_user' => $user->nama_user,
                'email' => $user->email,
                'role_user' => $user->role->nama_role
            ];
        }

        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <button type="button" id="'.$data['id'].'" class="btn btn-primary btn-labeled btn-labeled-left btn-sm edit-modal" data-toggle="modal" data-target="#edit-modal"><b><i class="icon-pencil5"></i></b> Change Password</button>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);

        return response()->json([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array(
            'newpassword' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirmpassword' => 'required|same:newpassword',
        ));

        $error = $validator->errors();

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $error,
                'data' => $request->input(),
            ], 422);
        }

        if (!strcmp($request->newpassword, $request->confirmpassword) == 0) {
            $msg = ['new password is not same as confirm password'];
            return response()->json([
                'error' => true,
                'messages' => $msg,
            ], 422);
        }

        $user = User::find($id);
        $user->password = bcrypt($request->confirmpassword);
        $user->save();

        return response()->json([
            'error' => false,
            'messages' => 'Password berhasil disimpan!',
        ]);
    }

}
