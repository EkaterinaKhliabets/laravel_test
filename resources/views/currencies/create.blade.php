@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('currencies.store' )}}" method='POST'>
            @csrf

            <div class="col-12">
                <label for="name" class="form-label">Название валюты</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="id_number" class="form-label">Числовой код</label>
                <input type="text" name="id_number" id="id_number" value="{{old('id_number')}}" placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="character_code" class="form-label">Символьный код</label>
                <input type="text" name="character_code" id="character_code" value="{{old('character_code')}}" placeholder="" class="form-control">
            </div>

            <div>
                <button name="button" class="btn btn-primary">Добавить</button>
            </div>
        </form>

    </div>
@endsection

