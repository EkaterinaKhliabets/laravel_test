@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('contact_faces.store' )}}" method='POST'>
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">ФИО</label>
                <input type="text" name="name" id="name" value="{{old('name')}}"
                       placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" name="phone" id="phone" value="{{old('phone')}}" placeholder=""
                       class="form-control">
            </div>

            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" value="{{old('email')}}" placeholder=""
                       class="form-control">
            </div>

            <div class="col-8">
                <select class="form-select" name="client_id" aria-label="Default select example">
                    <option selected>Укажите компанию</option>
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="{{'работает'}}" selected>работает</option>
                    <option value="{{'уволен'}}">уволен</option>
                    <option value="{{'временно не работает'}}">временно не работает</option>
                </select>
            </div>

            <div class="col-8">
                <label for="position" class="form-label">Должность</label>
                <input type="text" name="position" id="position" value="{{old('position')}}" placeholder=""
                       class="form-control">
            </div>



            {{-- <div class="col-4">
                 <select class="form-select" name="pol" aria-label="Default select example">
                     <option selected>Укажите пол</option>
                     @foreach($clients as $client)
                         <option value="{{$client->id}}">{{$client->name}}</option>
                     @endforeach
                 </select>
             </div> --}}

            <div class="col-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="m" checked>
                    <label class="form-check-label" for="inlineRadio1">Мужской</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="w">
                    <label class="form-check-label" for="inlineRadio2">Женский</label>
                </div>
            </div>


            <div>
                <button name="button" class="btn btn-primary">Добавить</button>
            </div>

        </form>


    </div>

@endsection
