@extends('admin.layout')

@section('title', __('admin-cup.edit'))

@section('content')
<div class="container my-4">
    <h2>{{ __('admin-cup.edit') }}</h2>

    <form action="{{ route('admin.cups.update', $cup->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.cups.partials.form', ['cup' => $cup])
        
        <button type="submit" class="btn btn-primary">{{ __('admin-cup.update') }}</button>
    </form>
</div>
@endsection
