@extends('frontend.layout')

@section('title', 'سلة التسوق')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container my-5">
    <h1 class="mb-4">سلة التسوق</h1>

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>اسم المنتج</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجمالي</th>
                    <th>إجراء</th>
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
                        <td>{{ $item['price'] }} شيكل</td>
                        <td>{{ $subtotal }} شيكل</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end"><strong>الإجمالي الكلي:</strong></td>
                    <td colspan="2"><strong>{{ $total }} شيكل</strong></td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('checkout') }}" class="btn btn-success">الدفع</a>
    @else
        <p>السلة فارغة حالياً.</p>
    @endif
</div>
@endsection
