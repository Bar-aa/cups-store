@extends('frontend.layout')

@section('title', 'الرئيسية - متجر الأكواب')

@section('content')

<div class="text-center my-5">
    <h1 class="display-4">مرحباً بك في متجر الأكواب</h1>
    <p class="lead">أفضل الأكواب بأجود الخامات وأروع التصاميم.</p>
    <a href="{{ route('cups.index') }}" class="btn btn-primary btn-lg">تصفح جميع الأكواب</a>
</div>

<div class="container">
    <div class="row">
        @forelse($cups as $cup)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($cup->image) }}" class="card-img-top" alt="{{ $cup->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cup->name }}</h5>
                        <p class="card-text">{{ Str::limit($cup->description, 100) }}</p>
                        <p class="card-text"><strong>السعر:</strong> {{ $cup->price }} شيكل</p>
                        <a href="{{ route('cups.show', $cup->id) }}" class="btn btn-outline-primary">عرض التفاصيل</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">لا توجد أكواب حالياً.</p>
        @endforelse
    </div>
</div>

@endsection
