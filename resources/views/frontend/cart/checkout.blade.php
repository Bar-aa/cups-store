@extends('frontend.layout')

@section('title', __('checkout.title'))

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">{{ __('checkout.page_title') }}</h1>

    <form action="{{ route('checkout.placeOrder') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">{{ __('checkout.name') }}</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', auth()->user()->name) }}" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">{{ __('checkout.email') }}</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', auth()->user()->email) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">{{ __('checkout.phone') }}</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', auth()->user()->phone) }}">
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label">{{ __('checkout.address') }}</label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address', auth()->user()->address) }}">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">{{ __('checkout.confirm') }}</button>
        </div>
    </form>
</div>
@endsection
