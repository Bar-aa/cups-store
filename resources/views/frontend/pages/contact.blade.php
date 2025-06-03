@extends('frontend.layout')

@section('title', __('contact.title'))

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">{{ __('contact.heading') }}</h1>
    <p class="text-center">{{ __('contact.subheading') }}</p>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="#">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('contact.name') }}</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('contact.email') }}</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">{{ __('contact.message') }}</label>
                    <textarea name="message" class="form-control" id="message" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">{{ __('contact.send') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
