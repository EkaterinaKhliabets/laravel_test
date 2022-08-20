@extends('layout')

@section('content')

    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('users.update', ['user' => $user] )}}" method='POST'
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class=" form-group col-6">
                <label for="lastname" class="form-label">Фамилия</label>
                <input type="text" name="lastname" id="lastname" value="{{$user->lastname}}" placeholder=""
                       class="form-control">

                <label for="name" class="form-label">Имя</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" placeholder=""
                       class="form-control">
            </div>

            <div class="col-6">
                <div class="form-group">
                    <img src="{{asset("storage/". $user->avatar)}}" alt="" width="200" class="img-responsive">
                    <!-- <label for="exampleInputFile">Аватар</label> -->
                    <input type="file" name="avatar" id="exampleInputFile">
                </div>
            </div>

            <div class="col-6">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" name="phone" id="phone" value="{{$user->phone}}" placeholder=""
                       class="form-control">
            </div>

            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" value="{{$user->email}}" placeholder=""
                       class="form-control">
            </div>

            <div class="form-check">
                @if($user->not_valid == 1)
                    <input class="form-check-input" type="checkbox" value="" id="not_valid" name="not_valid" checked>
                @else
                    <input class="form-check-input" type="checkbox" value="" id="not_valid" name="not_valid">
                @endif
                <label class="form-check-label" for="not_valid">Недействителен</label>
            </div>

            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="is_admin"
                           name="is_admin" @if($user->is_admin) checked @endif >
                    <label class="form-check-label" for="is_admin">Администратор</label>
                </div>
            @endif

            <div>
                <button name="button" class="btn btn-primary">Изменить</button>
            </div>

        </form>
    </div>

@endsection
