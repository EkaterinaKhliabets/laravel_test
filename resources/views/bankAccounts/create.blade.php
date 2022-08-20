@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('bankAccounts.store' )}}" method='POST'>
            @csrf

            <div class="col-12">
                <label for="checking_account" class="form-label">Расчетный счет</label>
                <input type="text" name="checking_account" id="checking_account" value="{{old('checking_account')}}"
                       placeholder="" class="form-control">
            </div>
            <div class="col-8">
                <select class="form-select" name="bank_id" aria-label="Default select example">
                    <option selected>Укажите банк</option>
                    @foreach($banks as $bank)
                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">

                <select class="form-select" aria-label="Default select example" name="currency_id" >
                    <option selected>Укажите валюту</option>
                    @foreach($currencies as $currency)
                        <option value="{{$currency->id}}"  >{{$currency->name}}</option>
                    @endforeach
                </select>

            </div>


            <div>
                <button name="button" class="btn btn-primary">Добавить</button>
            </div>
        </form>

    </div>
@endsection
