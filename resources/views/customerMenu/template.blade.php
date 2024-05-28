<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <style>
    .link:hover {
color :yellow;
opacity: 0.5;
}
  </style>

<style>
  .logo {
    animation: shake 3.5s;
    animation-iteration-count: infinite;
  }
  
  @keyframes shake {
    0% { transform:  rotate(0deg); }
    40% { transform:  rotate(45deg); }
    80% { transform:  rotate(-45deg); }
    100% { transform: rotate(0deg); }
  }
  </style>


</head>
<body class="">
    <div class="header-firstnav bg-gradient-primary">
        <nav class="navbar navbar-expand-lg">
          <img src="{{ asset('icon/logo.PNG') }}" height="50px" width="50px" class="logo" alt="...">
          <div class="">Best Solution for Tranport</div>
        </nav>
    </div>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="#">Naura Transport</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#pickup">Pickup</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#tour">Tour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#contact_us">contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#about_us">about us</a>
        </li>
       
      </ul>
      {{-- <form class="d-flex">
        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> --}}
    </div>
  </nav>
@yield('content')

    <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
