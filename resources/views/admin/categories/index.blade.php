@extends('admin.layout')

@section('title', __('admin-category.title'))

@section('content')
<div class="container my-4">
    <h2>{{ __('admin-category.title') }}</h2>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">
        {{ __('admin-category.add_new') }}
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('admin-category.id') }}</th>
                <th>{{ __('admin-category.name') }}</th>
                <th>{{ __('admin-category.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                            {{ __('admin-category.edit') }}
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('admin-category.confirm_delete') }}');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">{{ __('admin-category.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
