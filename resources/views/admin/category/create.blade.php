@extends('layouts.app')

@section('content')
        <div class="container-fluid ms-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-4">
                        Добавление категории
                    </h3>
                    <form class="w-25" action="{{ route('admin.category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input name="title" type="text" class="form-control" placeholder="Введите название категории">
                        </div>
                        <input type="submit" class="mt-3 btn btn-primary" value="Добавить">
                        @error('title')
                            <div class="text-danger">Это поле необходимо для заполнения</div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
@endsection
