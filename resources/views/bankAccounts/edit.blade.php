@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('bankAccounts.update', ['bank_account'=>$bankAccount])}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="col-12">
                <label for="checking_account" class="form-label">Расчетный счет</label>
                <input type="text" name="checking_account" id="checking_account"
                       value="{{$bankAccount->checking_account}}"
                       placeholder="" class="form-control">
            </div>

            <div class="col-8">
                {{--  <select class="form-select" name="bank_id" aria-label="Default select example">
                      <option selected value="{{$bankAccount->id}}">{{$bankAccount->bank->name}}</option>
                  </select> --}}

                <select class="form-select" name="bank_id" aria-label="Default select example">
                    @foreach($banks as $bank)
                        @if($bankAccount->bank->id == $bank->id)
                            <option selected value="{{$bankAccount->bank->id}}">{{$bankAccount->bank->name}}</option>
                        @else
                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-4">
               {{-- <select class="form-select" aria-label="Default select example" name="currency_id">
                    <option selected value="{{$bankAccount->currency->id}}">{{$bankAccount->currency->name}}</option>
                </select>--}}

                <select class="form-select" aria-label="Default select example" name="currency_id">
                    @foreach($currencies as $currency)
                        @if($bankAccount->currency->id==$currency->id)
                            <option selected value="{{$bankAccount->currency->id}}">{{$bankAccount->currency->name}}</option>
                        @else
                            <option value="{{$currency->id}}">{{$currency->name}}</option>
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
