<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bordash - Admin Dashboard Template</title><!-- Favicon -->
    <link rel="stylesheet" href="/css/front_ecommerce.css" type="text/css"><!-- Slick.js styles -->
    <link rel="stylesheet" href="/css/front.css">
</head>
<body>


<!-- begin::main -->
<div id="main"><!-- begin::navigation -->

    <!-- begin::main-content -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-50">

                            <div class="invoice">
                                <div class="d-md-flex justify-content-between align-items-center">

                                    <h3 class="text-xs-left m-b-0">Invoice</h3></div>
                                <hr class="m-t-b-50">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Продавец</b></p>
                                        <p>{{$organization->name}},
                                            <br>УНП: {{$organization->unp}},
                                            <br>{{$organization->address}}.
                                            <br>р/с: {{$bankAccount->checking_account}}.
                                        </p>
                                    </div>
                                    <div class="col-md-6"><p class="text-right"><b>Покупатель</b></p>
                                        <p class="text-right">{{$client->name}}</p>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-4 mt-4">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Наименование</th>
                                            <th class="text-right">Количество</th>
                                            <th class="text-right">Цена</th>
                                            <th class="text-right">Сумма</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $pos = 1;
                                        @endphp
                                        @foreach($buys as $buy)
                                            <tr class="text-right">
                                                <td class="text-left">{{$pos}}</td>
                                                <td class="text-left">{{$buy->product->name}}</td>
                                                <td>{{$buy->quantity}}</td>
                                                <td>{{$buy->price}}</td>
                                                <td>{{$buy->quantity*$buy->price}}</td>

                                                @php
                                                    $pos ++;
                                                @endphp

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">

                                    <h4 class="font-weight-800">Итоговая сумма: {{$order->total}} </h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- end::main-content -->
</div><!-- end::main -->

</body>
</html>


