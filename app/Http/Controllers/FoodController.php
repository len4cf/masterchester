<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function show()
    {
        $foods = Food::all();

        dd($foods);

    }

    public function find(string $id) {

        $foods = Food::findOrFail($id);

        dd($foods);


    }
}
