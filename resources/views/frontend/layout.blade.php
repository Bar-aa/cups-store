<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', __('main.site_title'))</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />

    <style>
        body {
            padding-top: 70px;
        }
        
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">
    <form method="GET" action="{{ route('locale.switch') }}" class="d-inline">
        <select name="lang" onchange="this.form.submit()" class="form-select form-select-sm">
            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
            <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
        </select>
    </form>
    <a class="navbar-brand" href="{{ route('home') }}">{{ __('main.brand') }}</a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('main.toggle_navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('main.home') }}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cups.index') }}">{{ __('main.cups') }}</a></li>
        @auth
        @csrf
        <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">{{ __('main.cart') }}</a></li>
        @endauth
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">{{ __('main.about') }}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">{{ __('main.contact') }}</a></li>
        @auth
            <a href="{{ route('profile') }}" class="nav-link">{{ __('main.profile') }}</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger me-2">{{ __('auth.logout') }}</button>
            </form>
        @else
            <a href="{{ route('register') }}" class="nav-link">{{ __('auth.register') }}</a>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
