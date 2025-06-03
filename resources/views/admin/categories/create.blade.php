@extends('admin.layout')

@section('title', __('admin-category.add_new'))

@section('content')
<div class="container my-4">
    <h2>{{ __('admin-category.add_new') }}</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('admin-category.name') }}</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">{{ __('admin-category.save') }}</button>
    </form>
</div>
@endsection
