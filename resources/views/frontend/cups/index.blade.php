@extends('frontend.layout')

@section('title', 'جميع الأكواب')

@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center">تصفح جميع الأكواب</h2>

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
            <p class="text-center">لا توجد أكواب متاحة حالياً.</p>
        @endforelse
    </div>
</div>

@endsection
