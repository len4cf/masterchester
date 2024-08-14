<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cozinheiro extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cozinheiro';
    protected $fillable = [
        'nome',
        'tempo_carreira',
        'idade'
    ];


    public function menus() {
        return $this->hasMany(Menu::class);
    }


}
