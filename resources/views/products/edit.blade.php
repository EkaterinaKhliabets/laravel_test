@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('products.update', ['product' => $product] )}}" method='POST'>
            @csrf
            @method('PUT')

            <div class="col-12">
                <label for="name" class="form-label">Название продукта</label>
                <input type="text" name="name" id="name" value="{{$product->name}}" placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="price" class="form-label">Цена</label>
                <input type="text" name="price" id="price" value="{{$product->price}}" placeholder="" class="form-control">
            </div>

            <div>
                <button name="button" class="btn btn-primary">Сохранить</button>
            </div>
        </form>

    </div>
@endsection
