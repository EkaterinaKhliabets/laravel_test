@extends('layout')

@section('content')
    <div class="bg-light border rounded-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <!--  <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between"><h6 class="card-title">
                                            Количество заказов</h6>
                                        <div><a href="#" class="mr-3"><i class="fa fa-refresh"></i></a>
                                            <div class="dropdown"><a href="#" data-toggle="dropdown"
                                                                     aria-haspopup="true" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v" aria-hidden="true"></i></a><span
                                                    class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                 class="dropdown-item">Report</a><a
                                                        href="#" class="dropdown-item">Download</a><a href="#"
                                                                                                      class="dropdown-item">Close</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="number-of-orders"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between"><h6 class="card-title">Последние заказы</h6>
                                <div><a href="#" class="mr-3"><i class="fa fa-refresh"></i></a>
                                    <div class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                             aria-expanded="false"><i class="fa fa-ellipsis-v"
                                                                                      aria-hidden="true"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                          class="dropdown-item">Report</a><a
                                                href="#" class="dropdown-item">Download</a><a href="#"
                                                                                              class="dropdown-item">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Заказ id</th>
                                                <th>Клиент</th>
                                                <th>Менеджер</th>
                                                <th>Дата</th>
                                                <th>Сумма</th>
                                                <th>Статус</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td><a href="{{route('invoice.index', $order->id)}}">{{$order->id}}</a></td>
                                                    <td><a href="{{route('clients.edit', $order->client->id)}}">{{$order->client->name}}</a></td>
                                                    <td><a href="#">{{$order->user->name . ' ' . $order->user->lastname}}</a></td>

                                                    <td>{{$order->created_at}}</td>
                                                    <td>{{$order->total}}</td>
                                                    @if($order->paid==1)
                                                        <td><span class="badge badge-success">Оплачено</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger">Не оплачено</span></td>
                                                    @endif


                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between"><h6 class="card-title mb-0">Топ продаж
                                        </h6><a href="#">Количество</a></div>
                                </div>
                                <table class="table table-striped">
                                    @foreach($products as $product)
                                        <tr>
                                            <td><a href="{{route('products.edit', $product->product_id)}}">{{$product->name}}</a></td>
                                            <td>{{$product->quantity}}</td>
                                        </tr>
                                    @endforeach


                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between"><h6 class="card-title">Продажи</h6>
                                        <div><a href="#" class="mr-3"><i class="fa fa-refresh"></i></a><span
                                                class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i class="fa fa-ellipsis-v"
                                                                                             aria-hidden="true"></i></a><span
                                                    class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                 class="dropdown-item">Report</a><a
                                                        href="#" class="dropdown-item">Download</a><a href="#"
                                                                                                      class="dropdown-item">Close</a></span></span>
                                        </div>
                                    </div>
                                    <div id="revenue"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- begin::footer -->
    </div>
@endsection
