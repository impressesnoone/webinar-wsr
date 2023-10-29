@extends('layouts.app')

@section('content')
    <a href="{{ route('main') }}" class="btn btn-primary ms-5">Вернуться ко всем товарам</a>
    <div class="d-flex flex-wrap p-3">
            <div class="card text-center" style="width: 18rem;">
                <img src="{{asset('storage/' . $product->photo_url) }}" class="card-img-top" alt="...">
                <hr>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $product->cost }}р</li>
                    <li class="list-group-item">{{ $product->country }}</li>
                    <li class="list-group-item">{{ $product->release_year }}</li>
                    <li class="list-group-item">{{ $product->model }}</li>
                    <li class="list-group-item">В наличии: {{ $product->count }}</li>
                </ul>
            </div>
    </div>
@endsection
