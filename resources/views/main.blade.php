@extends('layouts.app')

@section('content')
    <h1 class="ms-3">Каталог</h1>
    <div class="container-fluid d-flex flex-wrap">
        <form action="{{ route('main.filter') }}" method="post">
            @csrf
            <div class="col mt-3">
                <label for="filter">Упорядочить по</label>
                <select name="filter" id="filter" class="form-select" aria-label="Default select example">
                    <option value="new">По новинкам</option>
                    <option value="year">Год производства</option>
                    <option value="name">По наименованию</option>
                    <option value="cost">По цене</option>
                </select>
            </div>
            <div class="col mt-3">
                <label for="category">Выберите категорию</label>
                <select id="category" name="category_id" class="form-select" aria-label="Default select example">
                    <option selected value="all">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Искать</button>
        </form>
        <div class="container-fluid justify-content-center w-75 d-flex flex-wrap">
            @foreach($products as $product)
                <div class="card text-center m-2" style="width: 18rem;">
                    <img src="{{asset('storage/' . $product->photo_url) }}" class="card-img-top" height="200" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $product->cost }}р</li>
                        <li class="list-group-item">{{ $product->country }}</li>
                        <li class="list-group-item">{{ $product->release_year }}</li>
                        <li class="list-group-item">{{ $product->model }}</li>
                        <li class="list-group-item">В наличии: {{ $product->count }}</li>
                        <li class="list-group-item">{{ $product->created_at->diffForhumans() }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route('main.show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
