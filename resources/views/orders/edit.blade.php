@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('orders.update', ['order' => $order] )}}" method='POST'>
            @csrf
            @method('PUT')

            <div class="col-6">
                <label for="client_id" class="form-label">Клиент</label>
                <input type="text" name="client_id" id="client_id" value="{{$order->client->name }}" placeholder="" class="form-control">
            </div>

            <div class="col-6">
                <label for="user_id" class="form-label">Менеджер</label>
                <input type="text" name="user_id" id="user_id" value="{{$order->user->name . ' ' . $order->user->lastname}}" placeholder="" class="form-control">
            </div>
        </form>

@endsection
