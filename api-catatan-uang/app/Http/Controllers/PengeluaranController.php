<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::where('user_id', auth()->id())->get();
        return view('home', compact('pengeluaran'));
    }

    public function create()
    {
        $pengeluaran = new Pengeluaran(); 
        return view('pengeluaran.create', compact('pengeluaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        $pengeluaran = new Pengeluaran([
            'user_id' => Auth::id(),
            'judul' => $request->get('judul'),
            'deskripsi' => $request->get('deskripsi'),
            'jumlah' => $request->get('jumlah'),
            'tanggal_pengeluaran' => $request->get('tanggal_pengeluaran'),
        ]);

        $pengeluaran->save();

        return redirect()->route('home')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->judul = $request->get('judul');
        $pengeluaran->deskripsi = $request->get('deskripsi');
        $pengeluaran->jumlah = $request->get('jumlah');
        $pengeluaran->tanggal_pengeluaran = $request->get('tanggal_pengeluaran');
        $pengeluaran->save();

        return redirect()->route('home')->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return redirect()->route('home')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
