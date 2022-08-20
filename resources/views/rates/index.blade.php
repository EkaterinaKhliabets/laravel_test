@extends('layout')

@section('content')
    <!--<div class=" px-4 ">-->
    <div class="d-flex bd-highlight mb-3">
        <a href="{{route('rates.download')}}" class="btn btn-primary">Загрузить с сайта</a>
    </div>
    <table class="table table-hover table-striped">
        <thead>
        <tr class="table-primary">
            <th scope="col">Дата</th>
            <th scope="col">Валюта</th>
            <th scope="col">Курс</th>
            <th scope="col">Кратность</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rates as $rate)
            <tr>
                <th scope="row">{{$rate->date}}</th>
                <th scope="row">{{$rate->currency->name}}</th>
                <th scope="row">{{$rate->rate}}</th>
                <th scope="row">{{$rate->scale}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
   {{-- {{ $products->links('vendor.pagination.bootstrap-5') }} --}}
    <!--</div>-->
@endsection
