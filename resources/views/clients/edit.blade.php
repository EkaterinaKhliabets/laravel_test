@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('clients.update', ['client'=>$client] )}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="col-12">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" id="name" value="{{$client->name}}"
                       placeholder="" class="form-control">
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" value="{{$client->email}}"
                       placeholder="" class="form-control">
            </div>

            <div class="col-12">
                <select class="form-select" name="user_id" aria-label="Default select example">
                    @foreach($users as $user)
                        @if($client->user->id == $user->id)
                            <option value="{{$user->id}}" selected>{{$user->name . ' ' . $user->lastname}}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name . ' ' . $user->lastname}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div>
                <button name="button" class="btn btn-primary">Изменить</button>
            </div>

        </form>
    </div>

@endsection
