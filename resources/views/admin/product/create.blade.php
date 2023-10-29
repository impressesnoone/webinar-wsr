@extends('layouts.app')

@section('content')
        <div class="w-25 p-5">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Наименование</span>
                <input type="text" name="title" class="form-control">
            </div>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Фото</label>
                <input type="file" name="photo_url" class="form-control" id="inputGroupFile01">
            </div>
                @error('photo_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="input-group mb-3">
                <span class="input-group-text">₽</span>
                <input type="number" name="cost" class="form-control" aria-label="Цена в рублях">
                <span class="input-group-text">.00</span>
            </div>
                @error('cost')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Страна</span>
                <input type="text" name="country" class="form-control">
            </div>
                @error('country')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            <div class="input-group mb-3">
                <span class="input-group-text">Год выпуска</span>
                <input type="text" name="release_year" class="form-control">
            </div>
                @error('release_year')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            <div class="input-group mb-3">
                <span class="input-group-text">Модель</span>
                <input type="text" name="model" class="form-control">
            </div>
                @error('model')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <select name="category_id" class="form-select" aria-label="Default select example">
                    <option selected>Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="mt-3 btn btn-primary">Добавить</button>
    </form>
        </div>
@endsection
