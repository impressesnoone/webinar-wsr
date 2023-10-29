@extends('layouts.app')

@section('content')
        <div class="w-25 p-5">
            <h1>Изменение товара</h1>
            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="input-group mb-3">
                    <select name="is_published" class="form-select" aria-label="Default select example">
                        <option selected>Выберите действие</option>
                        <option @if($product->is_published == '0' ? 'selected' : '') selected @endif value="0">Не опубликован</option>
                        <option @if($product->is_published == '1' ? 'selected' : '') selected @endif value="1">Опубликовать</option>
                    </select>
                </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Наименование</span>
                <input value="{{ $product->title }}" type="text" name="title" class="form-control">
            </div>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="w-25">
                    <img src="{{ asset('storage/'. $product->photo_url) }}" alt="">
                </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="photo">Фото</label>
                <input type="file" name="photo_url" class="form-control" id="photo">
            </div>
                @error('photo_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="input-group mb-3">
                <span class="input-group-text">₽</span>
                <input value="{{ $product->cost }}" type="number" name="cost" class="form-control" aria-label="Цена в рублях">
                <span class="input-group-text">.00</span>
            </div>
                @error('cost')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Страна</span>
                <input value="{{ $product->country }}" type="text" name="country" class="form-control">
            </div>
                @error('country')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            <div class="input-group mb-3">
                <span class="input-group-text">Год выпуска</span>
                <input value="{{ $product->release_year }}" type="text" name="release_year" class="form-control">
            </div>
                @error('release_year')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            <div class="input-group mb-3">
                <span class="input-group-text">Модель</span>
                <input value="{{ $product->model }}" type="text" name="model" class="form-control">
            </div>
                @error('model')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text">Колличество</span>
                    <input value="{{ $product->count }}" type="number" name="count" class="form-control">
                </div>
                @error('count')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <select name="category_id" class="form-select" aria-label="Default select example">
                    <option selected>Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? ' selected' : ''}}
                        >{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="mt-3 btn btn-primary">Изменить</button>
                <a href="{{ route('admin.product.show', $product->id) }}" class="mt-3 btn btn-primary">Вернуться к товару</a>
    </form>
        </div>
@endsection
