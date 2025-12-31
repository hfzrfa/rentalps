<?php
// Controller CRUD PlayStation untuk Admin
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playstation;
use Illuminate\Http\Request;

class PlaystationController extends Controller
{
    public function index()
    {
        $playstations = Playstation::all();
        return view('admin.playstations.index', compact('playstations'));
    }

    public function create()
    {
        return view('admin.playstations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga_per_jam' => 'required|numeric',
        ]);

        Playstation::create([
            'nama' => $request->nama,
            'harga_per_jam' => $request->harga_per_jam,
            'status' => 'tersedia',
        ]);

        return redirect()->route('admin.playstations.index')
            ->with('success', 'PlayStation berhasil ditambahkan');
    }

    public function edit(Playstation $playstation)
    {
        return view('admin.playstations.edit', compact('playstation'));
    }

    public function update(Request $request, Playstation $playstation)
    {
        $request->validate([
            'nama' => 'required',
            'harga_per_jam' => 'required|integer',
            'status' => 'required',
        ]);

        $playstation->update($request->all());

        return redirect()->route('admin.playstations.index')
            ->with('success', 'PlayStation berhasil diupdate');
    }

    public function destroy(Playstation $playstation)
    {
        $playstation->delete();

        return redirect()->route('admin.playstations.index')
            ->with('success', 'PlayStation berhasil dihapus');
    }
}
