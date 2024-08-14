<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';

    protected $fillable = [
        'nome',
        'peso',
        'preco',
        'kcal',
        'categoria',
        'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }


}
