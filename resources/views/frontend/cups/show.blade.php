@extends('frontend.layout')

@section('title', $cup->name)

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset($cup->image) }}" class="img-fluid rounded" alt="{{ $cup->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $cup->name }}</h2>
            <p class="text-muted">التصنيف: {{ $cup->category->name ?? 'غير محدد' }}</p>
            <p>{{ $cup->description }}</p>
            <h4>السعر: {{ $cup->price }} شيكل</h4>

            <form action="{{ route('cart.add', $cup->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="quantity" class="form-label">الكمية:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control" style="width:100px;">
                </div>
                <button type="submit" class="btn btn-primary">أضف إلى السلة</button>
            </form>

        </div>
    </div>

    <hr class="my-5">

    <div class="d-flex justify-content-center mt-5">
    <div class="d-flex flex-row gap-4" style="width: 90%; max-width: 1200px;">

        {{-- التقييمات --}}
        <div style="flex: 1; max-height: 400px; overflow-y: auto;" class="border rounded p-3 bg-light">
            <h4 class="text-center">التقييمات:</h4>

            @if($cup->reviews->isEmpty())
                <p class="text-center">لا توجد تقييمات بعد.</p>
            @else
                <ul class="list-group">
                    @foreach($cup->reviews as $review)
                        <li class="list-group-item mb-2">
                            <strong>{{ $review->user->name ?? 'مستخدم غير معروف' }}</strong><br/>
                            تقييم:
                            @for($i = 1; $i <= 5; $i++)
                                <span style="color: {{ $i <= $review->rating ? 'gold' : '#ccc' }};">&#9733;</span>
                            @endfor
                            <br/>
                            @if($review->comment)
                                <p class="mb-0">{{ $review->comment }}</p>
                            @else
                                <em>لا يوجد تعليق</em>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- نموذج التقييم --}}
        <div style="flex: 1;" class="border rounded p-3 bg-white">
            <h4 class="text-center">أضف تقييمك</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @auth
            <form action="{{ route('reviews.store', $cup->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="rating" class="form-label">التقييم:</label>
                    <select name="rating" id="rating" class="form-select @error('rating') is-invalid @enderror" required>
                        <option value="">اختر تقييم</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} نجوم</option>
                        @endfor
                    </select>
                    @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">تعليق (اختياري):</label>
                    <textarea name="comment" id="comment" rows="3" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                    @error('comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">إرسال التقييم</button>
            </form>
            @else
                <p class="text-center">يرجى <a href="{{ route('login') }}">تسجيل الدخول</a> لتتمكن من إضافة تقييم.</p>
            @endauth
        </div>
    </div>
</div>



</div>

@endsection
