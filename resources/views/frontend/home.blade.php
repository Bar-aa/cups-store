@extends('frontend.layout')

@section('title', __('home.title'))

@section('content')

<div class="text-center my-5">
    <h1 class="display-4">{{ __('home.welcome') }}</h1>
    <p class="lead">{{ __('home.subtitle') }}</p>
    <a href="{{ route('cups.index') }}" class="btn btn-primary btn-lg">{{ __('home.browse_cups') }}</a>
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
                        <p class="card-text"><strong>{{ __('home.price') }}:</strong> {{ $cup->price }} {{ __('home.currency') }}</p>
                        <a href="{{ route('cups.show', $cup->id) }}" class="btn btn-outline-primary">{{ __('home.view_details') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">{{ __('home.no_cups') }}</p>
        @endforelse
    </div>
</div>

@endsection
