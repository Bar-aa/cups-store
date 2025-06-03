@extends('admin.layout')

@section('content')
<h1>{{ __('admin-orders.orders_list') }}</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin-orders.user') }}</th>
            <th>{{ __('admin-orders.total') }} {{ __('admin-cup.currency') }}</th>
            <th>{{ __('admin-orders.status') }}</th>
            <th>{{ __('admin-orders.created_at') }}</th>
            <th>{{ __('admin-orders.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name ?? '-' }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ __('admin-orders.' . $order->status) }}</td>
            <td>{{ $order->created_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">{{ __('admin-orders.view') }}</a>
                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">{{ __('admin-orders.edit') }}</a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('{{ __('admin-orders.delete_confirm') }}');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">{{ __('admin-orders.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}
@endsection
