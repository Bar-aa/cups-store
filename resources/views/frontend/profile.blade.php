@extends('frontend.layout')

@section('title', __('profile.title'))

@section('content')
<div class="container my-5">
    <h1 class="mb-4">{{ __('profile.header') }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('profile.name') }}</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('profile.email') }}</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">{{ __('profile.phone') }}</label>
            <input type="text" class="form-control" id="phone" name="phone"
                   value="{{ old('phone', $user->phone ?? '') }}">
            @error('phone')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">{{ __('profile.address') }}</label>
            <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $user->address ?? '') }}</textarea>
            @error('address')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('profile.save_changes') }}</button>
    </form>

    {{-- قسم الطلبات --}}
    <h2 class="mt-5">{{ __('profile.orders') }}</h2>

    @if($user->orders->isEmpty())
        <p>{{ __('profile.no_orders') }}</p>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>{{ __('profile.order_id') }}</th>
                    <th>{{ __('profile.status') }}</th>
                    <th>{{ __('profile.total') }}</th>
                    <th>{{ __('profile.ordered_at') }}</th>
                    <th>{{ __('profile.items') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ __('admin-orders.' . $order->status) }}</td>
                    <td>{{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach($order->items as $item)
                                <li>{{ $item->cup->name ?? '---' }} ({{ $item->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
