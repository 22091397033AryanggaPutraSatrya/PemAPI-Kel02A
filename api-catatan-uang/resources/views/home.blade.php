@extends('layouts.app')

@section('body')
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #fff;
            padding-top: 20px;
            padding-bottom: 20px; /* Menambah jarak bawah */
        }

        .btn-custom {
            margin-top: 10px; Menambah jarak antara tombol
        }

        .table-custom {
            margin-top: 20px; /* Menambah jarak atas tabel */
        }

        .total-section {
            margin-top: 20px; /* Menambah jarak atas seksi total */
        }
    </style>

    <div class="container">
        <h5>Sisa Uang: Rp. {{ number_format($totalPemasukan - $totalPengeluaran, 0, ',', '.') }}</h5>
        <div class="col-md-12">
            <form class="mt-3" action="{{ route('home') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <button type="submit" class="btn btn-danger"><a href="/home" style="color: white; text-decoration: none">Reset</a></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-5">
            <!-- Data Pemasukan -->
            <div class="col-md-6">
                <h4>Data Pemasukan</h4>
                <a href="{{ route('pemasukan.create') }}" class="btn btn-primary btn-custom">Tambah Catatan Pemasukan</a>

                <table class="table table-custom table-dark">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemasukans as $pemasukan)
                            <tr>
                                <td>{{ $pemasukan->judul }}</td>
                                <td>{{ $pemasukan->deskripsi }}</td>
                                <td>Rp. {{ number_format($pemasukan->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $pemasukan->tanggal_pemasukan }}</td>
                                <td>
                                    <a href="{{ route('pemasukan.edit', $pemasukan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="total-section">
                    <h5>Pemasukan Total: Rp. {{ number_format($totalPemasukan, 0, ',', '.') }}</h5>
                </div>
            </div>

            <!-- Data Pengeluaran -->
            <div class="col-md-6">
                <h4>Data Pengeluaran</h4>
                <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary btn-custom">Tambah Catatan Pengeluaran</a>

                <table class="table table-custom table-dark">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengeluarans as $pengeluaran)
                            <tr>
                                <td>{{ $pengeluaran->judul }}</td>
                                <td>{{ $pengeluaran->deskripsi }}</td>
                                <td>Rp. {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                                <td>
                                    <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="total-section">
                    <h5>Pengeluaran Total: Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</h5>
                </div>
            </div>

            <!-- Filter Tanggal -->
            
        </div>
    </div>
@endsection
