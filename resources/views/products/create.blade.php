@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('products.store' )}}" method='POST'>
            @csrf

            <div class="col-12">
                <label for="name" class="form-label">Название продукта</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="" class="form-control">
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Цена</label>
                <input type="text" name="price" id="price" value="{{old('price')}}" placeholder="" class="form-control">
            </div>
            <div>
                <button name="button" class="btn btn-primary">Добавить</button>
            </div>
        </form>

    </div>
@endsection

