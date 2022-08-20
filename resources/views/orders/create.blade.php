@extends('layout')

@section('content')
    <div class="container">

        <div>
            @include("errors")
        </div>

        <form class="row g-3" action="{{route('orders.store' )}}" method='POST'>
            @csrf

            <div class="col-6">
                <select class="form-select" aria-label="Default select example" name="client_id">
                    <option selected>Клиент</option>
                    @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-6">
                <select class="form-select crm-set-currency" aria-label="Default select example" name="bank_account_id">
                    <option selected>Банковский счет</option>
                    @foreach($bankAccounts as $bankAccount)
                        <option value="{{$bankAccount->id}}">{{$bankAccount->checking_account }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-6">
                <select class="form-select" aria-label="Default select example" name="user_id">
                    <option selected>Менеджер</option>
                    @foreach($users as $user)
                        @if(\Illuminate\Support\Facades\Auth::user()->id = $user->id)
                            <option value="{{$user->id}}" selected>{{$user->name . ' ' . $user->lastname }}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name . ' ' . $user->lastname }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-6">
                <label for="currency_character_code" class="form-label">Валюта</label>
                <input class="crm-find-rate crm-element-background" type="text" name="currency_character_code"
                       id="currency_character_code"
                       value="" readonly>
                <input type="hidden" name="currency_id" id="currency_id" value="" readonly>
            </div>

            <input type="hidden" name="rate" id="rate" value="">
            <input type="hidden" name="scale" id="scale" value="">

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="paid">
                <label class="form-check-label" for="flexCheckChecked"> Оплачено </label>
            </div>


            <div class="col-4">
                <select class="form-select crm-set-product" aria-label="Default select example" id="crm-set-product"
                        name="product">
                    <option selected>Выберите товар</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name }}</option>
                    @endforeach
                </select>

                {{-- <label for="price" class="form-label">Цена (будет невидимой потом)</label> --}}
                <input type="hidden" name="price" id="price" value="">

                <label for="price_cur" class="form-label">Цена в валюте</label>
                <input type="text" name="price_cur" id="price_cur" value="">

                <label for="quantity" class="form-label">Количество</label>
                <input class="" type="text" name="quantity" id="quantity" value="">

                <div class="col-md-4">
                    <button class="btn btn-secondary crm-laravel-add-product-orders">Добавить товар</button>
                </div>



            </div>

            <div class="col-8">

                <table class="table table-striped table-hover" id="crm-laravel-table" name="table-products">
                    <thead>
                    <tr >
                        <th scope="col">Товар</th>
                        <th scope="col">Кол-во</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Сумма (бел)</th>
                        <th scope="col">Сумма (вал)</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tr>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>

                    </tr>
                </table>

                <div>
                    <button name="button" class="btn btn-primary">Создать заказ</button>
                </div>



              {{-- <div class="col-6">
                    <a href="{{route('invoice.index', ['id'=>'2'])}}" class="btn btn-secondary">Инвойс</a>
                </div> --}}

            </div>
        </form>

    </div>
@endsection
