<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\Auth;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::where('user_id', auth()->id())->get();
        return view('home.blade', compact('pemasukan'));
    }

    public function create()
    {
        $pemasukan = new Pemasukan(); 
        return view('pemasukan.create', compact('pemasukan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_pemasukan' => 'required|date',
        ]);

        $pemasukan = new Pemasukan([
            'user_id' => Auth::id(),
            'judul' => $request->get('judul'),
            'deskripsi' => $request->get('deskripsi'),
            'jumlah' => $request->get('jumlah'),
            'tanggal_pemasukan' => $request->get('tanggal_pemasukan'),
        ]);

        $pemasukan->save();

        return redirect()->route('home')->with('success', 'Pemasukan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.edit', compact('pemasukan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_pemasukan' => 'required|date',
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->judul = $request->get('judul');
        $pemasukan->deskripsi = $request->get('deskripsi');
        $pemasukan->jumlah = $request->get('jumlah');
        $pemasukan->tanggal_pemasukan = $request->get('tanggal_pemasukan');
        $pemasukan->save();

        return redirect()->route('home')->with('success', 'Pemasukan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();

        return redirect()->route('home')->with('success', 'Pemasukan berhasil dihapus.');
    }
}
