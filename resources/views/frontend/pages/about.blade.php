@extends('frontend.layout')

@section('title', __('about.title'))

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1>{{ __('about.heading') }}</h1>
        <p class="lead">{{ __('about.subheading') }}</p>
    </div>

    <div class="row align-items-center g-3">
        <div class="col-md-8 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/about.png') }}" class="img-fluid rounded shadow about-image" alt="About Us">
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
            <div class="text-center about-text">
                <p>{{ __('about.description_1') }}</p>
                <p>{{ __('about.description_2') }}</p>
                <p>{{ __('about.description_3') }}</p>
            </div>
        </div>
    </div>
</div>

<style>
    .about-image {
        width: 100%;
        height: auto;
        min-height: 400px;
        object-fit: contain;
    }

    .about-text {
        padding: 1rem;
    }

    .about-text p {
        margin-bottom: 1rem;
    }

    @media (max-width: 767.98px) {
        .about-image {
            min-height: 250px;
        }
        .col-md-4 {
            text-align: center;
            margin-top: 1rem;
        }
        .about-text {
            padding: 0.5rem;
        }
    }
</style>
@endsection