@extends('admin.layout')

@section('content')
<h1>{{ __('admin-orders.orders_list') }} #{{ $order->id }}</h1>

<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mb-3">
    {{ __('admin-orders.orders_list') }}
</a>

<table class="table table-bordered">
    <tr>
        <th>{{ __('admin-orders.user') }}</th>
        <td>{{ $order->user->name ?? '-' }}</td>
    </tr>
    <tr>
        <th>{{ __('admin-orders.total') }}</th>
        <td>{{ $order->total }}</td>
    </tr>
    <tr>
        <th>{{ __('admin-orders.status') }}</th>
        <td>{{ __('admin-orders.' . $order->status) }}</td>
    </tr>
    <tr>
        <th>{{ __('admin-orders.created_at') }}</th>
        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
    </tr>
</table>

<h3>{{ __('admin-orders.items') ?? 'Items' }}</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin-orders.cup') ?? 'Cup' }}</th>
            <th>{{ __('admin-orders.quantity') ?? 'Quantity' }}</th>
            <th>{{ __('admin-orders.price') ?? 'Price' }}</th>
            <th>{{ __('admin-orders.subtotal') ?? 'Subtotal' }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->cup->name ?? '-' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->price, 2) }}</td>
            <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">
    {{ __('admin-orders.edit') }}
</a>
<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
    {{ __('admin-orders.orders_list') }}
</a>

@endsection
