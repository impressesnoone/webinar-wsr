@extends('layouts.app')

@section('content')
    <div class="mt-2 ms-5">
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">
            Добавить товар
        </a>
    </div>
    <div class="container-fluid justify-content-center w-75 d-flex flex-wrap">
        @foreach($products as $product)
            <div class="card text-center m-2" style="width: 18rem;">
                <img src="{{asset('storage/' . $product->photo_url) }}" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-title">
                        {{ $product->is_published == '0' ? 'Не опубликован' : 'Опубликован' }}
                    </p>
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
                    <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
