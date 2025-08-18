<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Landing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
    <h1 class="mb-4 fw-bold text-primary">Welcome to IEMS</h1>

    @guest
      <div class="d-flex gap-3">
        @if(Route::has('login'))
          <a href="{{ route('login') }}" class="btn btn-primary btn-lg"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a>
        @else
          <a href="{{ url('/login') }}" class="btn btn-primary btn-lg"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a>
        @endif

        @if(Route::has('register'))
          <a href="{{ route('register') }}" class="btn btn-success btn-lg"><i class="bi bi-person-plus me-1"></i> Register</a>
        @else
          <a href="{{ url('/register') }}" class="btn btn-success btn-lg"><i class="bi bi-person-plus me-1"></i> Register</a>
        @endif
      </div>
    @else
      <div class="d-flex gap-3">
        @php
          $dash = Route::has('dashboard') ? route('dashboard') : url('/dashboard');
          $logoutAction = Route::has('logout') ? route('logout') : url('/logout');
        @endphp

        <a href="{{ $dash }}" class="btn btn-primary btn-lg"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a>

        <form action="{{ $logoutAction }}" method="POST" class="m-0">
          @csrf
          <button type="submit" class="btn btn-danger btn-lg">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
      </div>
    @endguest
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
