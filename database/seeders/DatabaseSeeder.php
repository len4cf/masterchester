<?php

namespace Database\Seeders;

use App\Models\Cozinheiro;
use App\Models\Food;
use App\Models\Menu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CozinheiroFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//
        Cozinheiro::factory(10)->create();

        Cozinheiro::factory()->create([
           'nome' => 'Erick Jacquin',
        ]);

        Cozinheiro::factory()->create([
            'nome' => 'Helena Risso',
            'idade' => 45
        ]);

        Cozinheiro::factory()->create([
            'nome' => 'Paola Carosella',
            'idade' => 50,
            'tempo_carreira' => 20
        ]);

//        Menu::factory(10)->create();


        Menu::factory()->create([
            'cozinheiro_id' => 1,
           'descricao' => 'Menu de Massas'
        ]);

        Menu::factory()->create([
            'cozinheiro_id' => 2,
            'descricao' => 'Menu de Carnes'
        ]);

//        Food::factory(10)->create();

        Food::factory()->create([
            'nome' => 'Lasanha de Carne',
            'peso' => 600,
            'kcal' => 1300,
            'preco' => 43,
            'categoria' => 'Massa',
            'menu_id' => 1
        ]);

        Food::factory()->create([
            'nome' => 'Carbonara',
            'peso' => 600,
            'kcal' => 1300,
            'preco' => 32,
            'categoria' => 'Massa',
            'menu_id' => 1
        ]);

        Food::factory()->create([
            'nome' => 'Picanha acebolada',
            'peso' => 600,
            'kcal' => 1300,
            'preco' => 67,
            'categoria' => 'Carne',
            'menu_id' => 2
        ]);

        Food::factory()->create([
            'nome' => 'Ancho com tomate',
            'peso' => 600,
            'kcal' => 1300,
            'preco' => 87,
            'categoria' => 'Carne',
            'menu_id' => 2
        ]);







    }
}
