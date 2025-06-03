@extends('admin.layout')

@section('title', __('admin.dashboard'))

@section('content')
<div class="container my-4">
    <h2 class="mb-4">{{ __('admin.welcome') }}, {{ Auth::user()->name }}</h2>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5>{{ __('admin.total_users') }}</h5>
                    <p class="fs-4">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5>{{ __('admin.total_orders') }}</h5>
                    <p class="fs-4">{{ $orderCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5>{{ __('admin.total_cups') }}</h5>
                    <p class="fs-4">{{ $cupCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5>{{ __('admin.total_reviews') }}</h5>
                    <p class="fs-4">{{ $reviewCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5>{{ __('admin.total_categories') }}</h5>
                    <p class="fs-4">{{ $categoryCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="list-group">
        <a href="{{ route('admin.cups.index') }}" class="list-group-item list-group-item-action">{{ __('admin.manage_cups') }}</a>
        <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action">{{ __('admin.manage_categories') }}</a>
        <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action">{{ __('admin.manage_orders') }}</a>
        
    </div>
</div>
@endsection
