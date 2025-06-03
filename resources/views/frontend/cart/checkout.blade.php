@extends('frontend.layout')

@section('title', 'صفحة الدفع')

@section('content')
<div class="container my-5">
    <h1>صفحة الدفع</h1>
    <p>هنا يمكنك متابعة إتمام عملية الدفع.</p>

    <form action="{{ route('checkout.placeOrder') }}" method="POST">
    @csrf
    
    <button type="submit" class="btn btn-primary">تأكيد الدفع</button>
</form>
</div>
@endsection
