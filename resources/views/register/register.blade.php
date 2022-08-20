@extends('layout')

@section('content')
    <div class="col-md-10">

        <h3 class="text-uppercase">Регистрация</h3>
        @include("errors")
        <br>

        <form class="row g-3" role="form" method="post" action="{{route('register')}}">
            @csrf

            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Имя" value="{{old('name')}}">
            </div>

            <div class="col-md-10">
                <input type="text" class="form-control" id="lastname" name="lastname"
                       placeholder="Фамилия" value="{{old('lastname')}}">
            </div>

            <div class="col-md-10">
                <input type="text" class="form-control" id="email" name="email"
                       placeholder="Email" value="{{old('email')}}">
            </div>

            <div class="col-md-10">
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Пароль">
            </div>

            <div class="col-md-10">
                <button type="submit" class="btn btn-primary">Зарегистрировать</button>
            </div>

        </form>

    </div>
@endsection




