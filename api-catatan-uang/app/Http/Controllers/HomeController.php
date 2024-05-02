<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Pemasukan::where('user_id', auth()->id());

        if ($start_date && $end_date) {
            $query->whereBetween('tanggal_pemasukan', [$start_date, $end_date]);
        }

        $pemasukans = $query->get();

        $query = Pengeluaran::where('user_id', auth()->id());

        if ($start_date && $end_date) {
            $query->whereBetween('tanggal_pengeluaran', [$start_date, $end_date]);
        }

        $pengeluarans = $query->get();

        $totalPemasukan = $pemasukans->sum('jumlah');
        $totalPengeluaran = $pengeluarans->sum('jumlah');

        return view('home', compact('pengeluarans', 'pemasukans', 'totalPemasukan', 'totalPengeluaran'));
    }
}
