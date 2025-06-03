@extends('frontend.layout')

@section('title', 'اتصل بنا')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">اتصل بنا</h1>
    <p>هل لديك أي استفسار أو ملاحظات؟ يسعدنا تواصلك معنا.</p>

    <form method="POST" action="#">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">الرسالة</label>
            <textarea class="form-control" id="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">إرسال</button>
    </form>
</div>
@endsection
