<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index(){
        $data = Menu::all(); 
        return view('layouts.menu', ['menus' => $data]);
    }
}
