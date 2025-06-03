@extends('frontend.layout')

@section('title', __('cart.title'))

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container my-5">
    <h1 class="mb-4">{{ __('cart.title') }}</h1>

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('cart.image') }}</th>
                    <th>{{ __('cart.product_name') }}</th>
                    <th>{{ __('cart.quantity') }}</th>
                    <th>{{ __('cart.price') }}</th>
                    <th>{{ __('cart.subtotal') }}</th>
                    <th>{{ __('cart.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td><img src="{{ asset('images/cups/' . basename($item['image'])) }}" alt="{{ $item['name'] }}" width="80"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }} {{ __('cart.currency') }}</td>
                        <td>{{ $subtotal }} {{ __('cart.currency') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">{{ __('cart.remove') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end"><strong>{{ __('cart.total') }}:</strong></td>
                    <td colspan="2"><strong>{{ $total }} {{ __('cart.currency') }}</strong></td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('checkout') }}" class="btn btn-success">{{ __('cart.checkout') }}</a>
    @else
        <p>{{ __('cart.empty') }}</p>
    @endif
</div>
@endsection
