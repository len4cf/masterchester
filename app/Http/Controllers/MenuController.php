<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{

    public function show(): View
    {
        $menus = Menu::all();

        return view('pages.menu-list', [
            'menus' => $menus
        ]);


    }

    public function find(string $id)
    {
        $menu = Menu::findOrFail($id);


        return view('pages.menu', [
            'menu' => $menu
        ]);

    }






}
