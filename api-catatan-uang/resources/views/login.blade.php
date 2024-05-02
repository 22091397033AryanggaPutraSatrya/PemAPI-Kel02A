<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Masuk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-4">
      <div class="card" style="background-color: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
          <h1 class="card-title" style="color: #fff;">Masuk</h1>
        </div>
        <div class="card-body">
          @if(Session::has('error'))
          <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
          </div>
          @endif
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label" style="color: #fff;">Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Email" required></input>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label" style="color: #fff;">Password</label>
              <input type="password" name="password" class="form-control" placeholder="******" id="password" required></input>
            </div>
            <div class="mb-3">
              <div class="d-grid">
                <button class="btn btn-primary">Masuk</button>
              </div>
              <p style="color: #fff;">Belum punya akun? <a href="/register" style="color: #fff;">Daftar disini</a>.</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
