<?php

namespace App\Http\Controllers;

use App\Models\Cozinheiro;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{

    public function show(): View
    {
        $cozinheiros = Cozinheiro::all();
        $menus = Menu::all()->whereIn('cozinheiro_id', $cozinheiros->pluck('id'));

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
