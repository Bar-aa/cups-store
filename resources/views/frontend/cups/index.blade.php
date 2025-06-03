@extends('frontend.layout')

@section('title', __('cups.all_cups'))

@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center">{{ __('cups.browse_all') }}</h2>

    <div class="row">
        @forelse($cups as $cup)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($cup->image) }}" class="card-img-top" alt="{{ $cup->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cup->name }}</h5>
                        <p class="card-text">{{ Str::limit($cup->description, 100) }}</p>
                        <p class="card-text"><strong>{{ __('cups.price') }}:</strong> {{ $cup->price }} {{ __('cups.currency') }}</p>
                        <a href="{{ route('cups.show', $cup->id) }}" class="btn btn-outline-primary">{{ __('cups.view_details') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">{{ __('cups.no_cups') }}</p>
        @endforelse
    </div>
</div>

@endsection
