<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'متجر الأكواب')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    
    <!-- Custom CSS -->
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
    {{-- Cupsta --}}
    <a class="navbar-brand" href="{{ route('home') }}">كوبستا </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">الرئيسية</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cups.index') }}">الأكواب</a></li>
        @auth
        @csrf
        <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">سلة المشتريات</a></li>
        @endauth
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">من نحن</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">اتصل بنا</a></li>
        @auth
            <a href="{{ route('profile') }}" class="nav-link">الملف الشخصي</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger me-2">تسجيل الخروج</button>
            </form>
        @else
            <a href="{{ route('register') }}" class="nav-link">إنشاء حساب</a>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<!-- Bootstrap JS (bundle includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
