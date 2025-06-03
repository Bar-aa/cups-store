@extends('admin.layout')

@section('title', __('admin-category.edit'))

@section('content')
<div class="container my-4">
    <h2>{{ __('admin-category.edit') }}</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('admin-category.name') }}</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('admin-category.update') }}</button>
    </form>
</div>
@endsection
