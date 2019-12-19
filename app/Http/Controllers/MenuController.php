<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelper;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public static function index() {
        $menus = Menu::where('parent_id', 0)->get();

        $html = '';

        for($i=0; $i< count($menus); $i++){
            $child = Menu::where('parent_id',$menus[$i]->id)->get();
            $modul = '';
            $menu ='';
            $view = '';

            $checkModul = FunctionHelper::checkMenu($menus[$i]->url);
            if($checkModul){
                if(count($child) == 0 ){
                    $modul .= '<li class="nav-item">'.
                                    '<a href="'.$menus[$i]->url.'" class="nav-link">'.
                                        '<i class="'.$menus[$i]->icon.'"></i>'.
                                        '<span>'.$menus[$i]->nama_menu.'</span>'.
                                    '</a>'.
                                '</li>';
                    $view .= $modul;
                }
                if (count($child) > 0){
                    $modul .='<li class="nav-item nav-item-submenu">'.
                                '<a href="#" class="nav-link ">'.
                                    '<i class="'.$menus[$i]->icon.'"></i>'.
                                    '<span>'.$menus[$i]->nama_menu.'</span>'.
                                '</a>';

                            for($j=0; $j< count($child); $j++){
                                // $checkMenu = FunctionHelper::checkMenu($child[$j]->url);
                                // if($checkMenu){
                                    $menu .= '<ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                    <li class="nav-item">
                                    <a href="'.$child[$j]->url.'" class="nav-link">'.
                                    '<i class="'.$child[$j]->icon.'"></i>'.
                                    $child[$j]->nama_menu.
                                    '</a>
                                    </li>
                                    </ul>';
                                // }
                        }
                    $view .= $modul.$menu.'</li>';
            
                }
                $html .= $view;
            }
        }
        return $html;
    }
}
