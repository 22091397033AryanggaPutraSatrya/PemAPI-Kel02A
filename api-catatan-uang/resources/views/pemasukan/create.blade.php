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
        <h1>Tambah Catatan Pemasukan</h1>
        <form action="{{ route('pemasukan.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input class="form-control" id="deskripsi" name="deskripsi" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="tanggal_pemasukan" class="form-label">Tanggal Pemasukan</label>
                <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
