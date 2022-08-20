@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('contact_faces.update', ['contact_face'=> $contactFace ]  )}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="col-12">
                <label for="name" class="form-label">ФИО</label>
                <input type="text" name="name" id="name" value="{{$contactFace->name}}"
                       placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" name="phone" id="phone" value="{{$contactFace->phone}}" placeholder=""
                       class="form-control">
            </div>

            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" value="{{$contactFace->email}}" placeholder=""
                       class="form-control">
            </div>



            <div class="col-8">
                <select class="form-select" name="client_id" aria-label="Default select example">
                    @foreach($clients as $client)
                        @if($contactFace->client->id == $contactFace->id)
                            <option value="{{$client->id}}" selected>{{$client->name}}</option>
                        @else
                            <option value="{{$client->id}}">{{$client->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>



            <div class="col-4">
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="{{'работает'}}" @if($contactFace->status == 'работает') selected @endif >работает</option>
                    <option value="{{'уволен'}}" @if($contactFace->status == 'уволен') selected @endif>уволен</option>
                    <option value="{{'временно не работает'}}" @if($contactFace->status == 'временно не работает') selected @endif>временно не работает</option>
                </select>
            </div>

            <div class="col-8">
                <label for="position" class="form-label">Должность</label>
                <input type="text" name="position" id="position" value="{{$contactFace->position}}" placeholder=""
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

                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="m" @if($contactFace->gender == 'm') checked @endif>
                    <label class="form-check-label" for="inlineRadio1">Мужской</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="w" @if($contactFace->gender == 'w') checked @endif>
                    <label class="form-check-label" for="inlineRadio2">Женский</label>
                </div>
            </div>


            <div>
                <button name="button" class="btn btn-primary">Изменить</button>
            </div>

        </form>


    </div>

@endsection
