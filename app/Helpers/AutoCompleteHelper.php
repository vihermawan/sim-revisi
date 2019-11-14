<?php
namespace App\Helpers;
use DB;
use App\Pasien;
use Illuminate\Http\Request;
class AutoCompleteHelper {
     
    public static function Pasien(Request $req) {

        $pasien = DB::table('pasien')
                ->where('nama_pasien', 'like', '%'.$req['query'].'%')
                ->get();

        $users_count = DB::table('pasien')
                        ->where('nama_pasien', 'like', '%'.$req['query'].'%')
                        ->count();

        $output = '<ul class="list-unstyled" style="background:#eee; cursor:pointer">';  
        if($users_count > 0) {
           
            foreach($pasien as $data) {
                $output .= '<li style="padding:12px" id='.$data->id.'>'.$data->nama_pasien.'</li>';  
            }
       }else {
        $output .= '<li style="padding:12px">Pasien tidak ditemukan</li>';  

       }

       $output .= '</ul>';  
       return $output; 

    }
}