<div class="mb-3">
    <label for="name" class="form-label">{{ __('admin-cup.name') }}</label>
    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $cup->name ?? '') }}">
</div>

<div class="mb-3">
    <label for="price" class="form-label">{{ __('admin-cup.price') }}</label>
    <input type="number" step="0.01" name="price" id="price" class="form-control" required value="{{ old('price', $cup->price ?? '') }}">
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">{{ __('admin-cup.category') }}</label>
    <select name="category_id" id="category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $cup->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="description" class="form-label">{{ __('admin-cup.description') }}</label>
    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $cup->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="stock" class="form-label">{{ __('admin-cup.stock') }}</label>
    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $cup->stock ?? 0) }}">
</div>

<div class="mb-3">
    <label for="image" class="form-label">{{ __('admin-cup.image') }}</label>
    <input type="file" name="image" id="image" class="form-control">
    @if(!empty($cup->image))
        <img src="{{ asset($cup->image) }}" width="100" class="mt-2">
    @endif
</div>
