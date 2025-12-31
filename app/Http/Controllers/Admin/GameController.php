<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'genre' => 'required',
            'harga_per_jam' => 'required|integer'
        ]);

        Game::create($request->all());

        return redirect()->route('admin.games.index')->with('success','Game ditambahkan');
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'nama' => 'required',
            'genre' => 'required',
            'harga_per_jam' => 'required|integer'
        ]);

        $game->update($request->all());

        return redirect()->route('admin.games.index')->with('success','Game diupdate');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return back()->with('success','Game dihapus');
    }
}
