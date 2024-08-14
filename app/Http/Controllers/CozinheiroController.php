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

    public function delete(string $id): View
    {
        $cozinheiro = Cozinheiro::findOrFail($id);

        $cozinheiro->delete();

        $cozinheiros = Cozinheiro::all();

        return view('pages.cozinheiro-list', [
            'cozinheiros' => $cozinheiros
        ]);

    }

    public function forceDelete(string $id): View
    {
        $cozinheiro = Cozinheiro::findOrFail($id);

        $cozinheiro->forceDelete();

        $cozinheiros = Cozinheiro::all();

        return view('pages.cozinheiro-list', [
            'cozinheiros' => $cozinheiros
        ]);
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
