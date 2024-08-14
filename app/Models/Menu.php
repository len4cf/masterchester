<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = [
        'cozinheiro_id',
        'descricao'
    ];

    public function cozinheiro() {
        return $this->belongsTo(Cozinheiro::class, 'cozinheiro_id');
    }

    public function foods()
    {
        return $this->hasMany(Food::class, 'menu_id');
    }

    public function food($id)
    {

        $food = $this->foods()->where('id', $id)->first();

        return $food;
    }


}
