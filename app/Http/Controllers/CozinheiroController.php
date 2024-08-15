<?php

namespace App\Http\Controllers;

use App\Models\Cozinheiro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CozinheiroController extends Controller
{
    public function show(): View
    {
        $cozinheiros = Cozinheiro::all();

        return view('pages.cozinheiro-list', [
            'cozinheiros' => $cozinheiros
        ]);

    }
    public function find(string $id): View
    {
        $cozinheiro = Cozinheiro::findOrFail($id);

        return view('pages.cozinheiro', [
            'cozinheiro' => $cozinheiro
        ]);

    }

    public function search(Request $request): View
    {
        $search = $request->input('search', '');
        $filter = $request->input('filter', 'disponiveis');

        $query = Cozinheiro::query();

        if ($search) {
            $query->where('nome', 'like', '%' . $search . '%');
        }

        if ($filter) {
            switch ($filter) {
                case 'maior_idade':
                    $query->orderBy('idade', 'desc');
                    break;
                case 'menor_idade':
                    $query->orderBy('idade', 'asc');
                    break;
                case 'menor_tempo_carreira':
                    $query->orderBy('tempo_carreira', 'asc');
                    break;
                case 'maior_tempo_carreira':
                    $query->orderBy('tempo_carreira', 'desc');
                    break;
                case 'cozinheiros_excluidos':
                    $query->onlyTrashed();
                    break;
            }
        }

        $cozinheiros = $query->get();

        return view('pages.cozinheiro-list', [
            'cozinheiros' => $cozinheiros
        ]);


//        dd($query->where('nome', 'like', '%' . 'paola' . '%')->get());

    }


    public function delete(string $id): View
    {
        $cozinheiro = Cozinheiro::findOrFail($id);

        $cozinheiro->delete();

        $cozinheiros = Cozinheiro::all();

        return view('pages.cozinheiro-list', [
            'cozinheiros' => $cozinheiros
        ]);

    }

    public function forceDelete(string $id): RedirectResponse
    {
        $cozinheiro = Cozinheiro::withTrashed()->findOrFail($id);

        $cozinheiro->forceDelete();


        return redirect()->to('/cozinheiro');

    }

    public function restore(string $id): View
    {

        $cozinheiro = Cozinheiro::onlyTrashed()->findOrFail($id);

        $cozinheiro->restore();

        $cozinheiros = Cozinheiro::all();

        return view('pages.cozinheiro-list', [
            'cozinheiros' => $cozinheiros
        ]);

    }



    public function create(Request $request): RedirectResponse
    {
        $cozinheiro = new Cozinheiro();

        $cozinheiro->nome = $request->input('nome');
        $cozinheiro->idade = $request->input('idade');
        $cozinheiro->tempo_carreira = $request->input('tempo_carreira');

        $cozinheiro->save();

        return redirect('/cozinheiro')->with('success', 'Cozinheiro criado com sucesso!');

    }

    public function showCreateForm(): View
    {
        return view('pages.create-cozinheiro');
    }


    public function update($id, Request $request): RedirectResponse
    {
        $cozinheiro = Cozinheiro::findOrFail($id);

        $cozinheiro->nome = $request->input('nome');
        $cozinheiro->idade = $request->input('idade');
        $cozinheiro->tempo_carreira = $request->input('tempo_carreira');

        $cozinheiro->save();

        return redirect('/cozinheiro');

    }

    public function showUpdateForm($id): View
    {

        $cozinheiro = Cozinheiro::findOrFail($id);

        return view('pages.update-cozinheiro', [
            'cozinheiro' => $cozinheiro
        ]);

    }





}
