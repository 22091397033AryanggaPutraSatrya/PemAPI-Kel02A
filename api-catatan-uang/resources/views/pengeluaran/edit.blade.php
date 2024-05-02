@extends('layouts.app')

@section('body')
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #fff;
            padding-top: 20px; /* Menambah jarak atas */
            padding-bottom: 20px; /* Menambah jarak bawah */
        }
    </style>
    <div class="container">
        <h1>Edit Pengeluaran</h1>
        <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $pengeluaran->judul }}" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input class="form-control" id="deskripsi" name="deskripsi" value="{{ $pengeluaran->deskripsi }}" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pengeluaran->jumlah }}" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="tanggal_pengeluaran" class="form-label">Tanggal Pengeluaran</label>
                <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="{{ $pengeluaran->tanggal_pengeluaran }}" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
