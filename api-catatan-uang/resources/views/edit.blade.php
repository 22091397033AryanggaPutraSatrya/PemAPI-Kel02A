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
    <h1 class="mb-0">Edit Profile</h1>
    <hr />
    <form action="{{ route('update.profile') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name_{{ uniqid() }}" class="form-control" placeholder="Name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email_{{ uniqid() }}" class="form-control" placeholder="email" value="{{ Auth::user()->email }}" required>
            </div>
        </div>
        
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
