@extends('layout')

@section('content')

    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('banks.update', ['bank' => $bank] )}}" method='POST'>
            @csrf
            @method('PUT')

            <div class="col-12">
                <label for="name" class="form-label">Название банка</label>
                <input type="text" name="name" id="name" value="{{$bank->name}}" placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="BIK" class="form-label">БИК</label>
                <input type="text" name="BIK" id="BIK" value="{{$bank->BIK}}" placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" name="phone" id="phone" value="{{$bank->phone}}" placeholder="" class="form-control">
            </div>

            <div class="col-3">
                <label for="city" class="form-label">Город</label>
                <input type="text" name="city" id="city" value="{{$bank->city}}" placeholder="" class="form-control">
            </div>

            <div class="col-9">
                <label for="address" class="form-label">Адрес</label>
                <input type="text" name="address" id="address" value="{{$bank->address}}" placeholder=""
                       class="form-control">
            </div>

            <div>
                <button name="button" class="btn btn-primary">Изменить</button>
            </div>
        </form>

    </div>


@endsection

