@extends('layouts.app')

@section('content')
    <div class="ms-5">
        <h1>Категории</h1>
        @if(session('msg'))
            <div class="w-25">
                <div class="alert alert-success">{{ session('msg') }}</div>
            </div>
        @endif
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Добавить</a>
        <div class="w-25">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Деействие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $category->title }}</td>
                        <td>
                            <form action="{{ route('admin.category.destroy',$category->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
