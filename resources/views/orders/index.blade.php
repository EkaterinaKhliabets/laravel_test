@extends('layout')

@section('content')
    <!--<div class=" px-4 ">-->
    <div class="d-flex bd-highlight mb-3">
        <a href="{{route('orders.create')}}" class="btn btn-primary">Добавить</a>


    </div>
    <table class="table table-hover table-striped">
        <thead>
        <tr class="table-primary">
            <th scope="col">Клиент</th>
            <th scope="col">Менеджер</th>
            <th scope="col">Сумма</th>
            <th scope="col">Сумма (вал)</th>
            <th scope="col">Оплачен</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->client->name}}</th>
                <th scope="row">{{$order->user->name . ' ' . $order->user->lastname}}</th>
                <th scope="row">{{$order->total}}</th>
                <th scope="row">{{$order->total_cur}}</th>
                <th scope="row">{{($order->paid==1)? 'да' : 'нет'   }}</th>
                <td>
                    <a href="{{route('invoice.index', $order->id)}}" class="fa fa-pencil">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                        </svg>
                    </a>

                  <!--  <a href="{{route('orders.edit', $order->id)}}" class="fa fa-pencil">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-eyedropper" viewBox="0 0 16 16">
                            <path
                                d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"></path>
                        </svg>
                    </a> -->
                    <form method="POST" action="{{route("orders.delete", $order->id)}}">
                        @csrf
                        @method("DELETE")
                        <button onclick="return confirm('Вы действительно хотите удалить?')" type="submit"
                                class="delete">
                            <a class="fa fa-remove">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        </button>
                    </form>
                    <i class="bi bi-eyedropper"></i>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- {{ $products->links('vendor.pagination.bootstrap-5') }} --}}
    <!--</div>-->
@endsection
