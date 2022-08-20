@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('clients.store' )}}" method='POST'>
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" id="name" value="{{old('name')}}"
                       placeholder="" class="form-control">
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" value="{{old('email')}}"
                       placeholder="" >
            </div>

            <div class="col-12">
                <select class="form-select" name="user_id" aria-label="Default select example">
                    <option selected>Укажите основного менеджера</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name . ' ' . $user->lastname}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button name="button" class="btn btn-primary">Добавить</button>
            </div>

        </form>
    </div>

@endsection
