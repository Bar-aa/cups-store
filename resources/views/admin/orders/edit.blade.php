@extends('admin.layout')

@section('content')
<h1>{{ __('admin-orders.update_status') }} #{{ $order->id }}</h1>

<form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="status">{{ __('admin-orders.status') }}</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>{{ __('admin-orders.pending') }}</option>
            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>{{ __('admin-orders.processing') }}</option>
            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>{{ __('admin-orders.shipped') }}</option>
            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>{{ __('admin-orders.delivered') }}</option>
            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>{{ __('admin-orders.cancelled') }}</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-2">{{ __('admin-orders.update_status') }}</button>
</form>
@endsection
