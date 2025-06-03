@extends('admin.layout')

@section('title', __('admin-cup.manage_cups'))

@section('content')
<div class="container my-4">

    <!-- زر إضافة كوب جديد -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ __('admin-cup.manage_cups') }}</h2>
        <a href="{{ route('admin.cups.create') }}" class="btn btn-primary">
            {{ __('admin-cup.add_new') }}
        </a>
    </div>

    <!-- الجدول -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('admin-cup.image') }}</th>
                <th>{{ __('admin-cup.name') }}</th>
                <th>{{ __('admin-cup.category') }}</th>
                <th>{{ __('admin-cup.stock') }}</th>
                <th>{{ __('admin-cup.price') }}</th>
                <th>{{ __('admin-cup.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cups as $cup)
                <tr>
                    <td>{{ $cup->id }}</td>
                    <td>
                        @if($cup->image)
                            <img src="{{ asset($cup->image) }}" alt="{{ $cup->name }}" class="cup-thumbnail">
                        @else
                            <span>{{ __('admin-cup.no_image') }}</span>
                        @endif
                    </td>
                    <td>{{ $cup->name }}</td>
                    <td>{{ $cup->category ? $cup->category->name : '-' }}</td>
                    <td>{{ $cup->stock }}</td>
                    <td>{{ $cup->price }} {{ __('admin-cup.currency') }}</td>
                    <td>
                        <a href="{{ route('admin.cups.edit', $cup->id) }}" class="btn btn-sm btn-warning">
                            {{ __('admin-cup.edit') }}
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cups->links() }}
</div>

<style>
    .cup-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: contain;
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 3px;
        background-color: #f8f9fa;
    }
</style>
@endsection