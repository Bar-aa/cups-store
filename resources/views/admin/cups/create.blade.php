@extends('admin.layout')

@section('title', __('admin-cup.add_new'))

@section('content')
<div class="container my-4">
    <h2>{{ __('admin-cup.add_new') }}</h2>

    <form action="{{ route('admin.cups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('admin-cup.name') }}</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('admin-cup.price') }}</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required value="{{ old('price') }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">{{ __('admin-cup.category') }}</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">{{ __('admin-cup.select_category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('admin-cup.description') }}</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">{{ __('admin-cup.stock') }}</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', 0) }}">
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">{{ __('admin-cup.image') }}</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('admin-cup.save') }}</button>
    </form>
</div>
@endsection
