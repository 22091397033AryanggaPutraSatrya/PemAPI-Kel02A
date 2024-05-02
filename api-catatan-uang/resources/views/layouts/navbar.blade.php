<nav class="navbar bg-body-tertiary" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
    <div class="container-fluid">
        <div class="col-md-6 mx-auto">
            <h2 style="padding-left: 70px">Welcome, {{ Auth::user()->name }}</h2>
        </div>
        <div class="col-md-6 text-end" style="padding-right: 80px">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button style="margin-top: 3px" class="btn btn-danger" type="submit">Keluar</button>
                </form>
                <a href="/edit" class="btn btn-primary">Ubah Profil</a>
            @endauth
        </div>
    </div>
</nav>
