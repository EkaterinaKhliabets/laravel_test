@extends('layout')

@section('content')

    <div class=" px-4 ">


        <div class="form-group">
            <a href="{{route('banks.create')}}" class="btn btn-primary">Добавить</a>
        </div>

        <table class="table table-hover table-striped">
            <thead>
            <tr class="table-primary">
                <th scope="col">Название</th>
                <th scope="col">BIK</th>
                <th scope="col">Город</th>
                <th scope="col">Адрес</th>
                <th scope="col">Телефон</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($banks as $bank)
                <tr>
                    <th scope="row">{{$bank->name}}</th>
                    <td>{{$bank->BIK}}</td>
                    <td>{{$bank->city}}</td>
                    <td>{{$bank->address}}</td>
                    <td>{{$bank->phone}}</td>
                    <td>
                        <a href="{{route('banks.edit', $bank->id)}}" class="fa fa-pencil">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-eyedropper" viewBox="0 0 16 16">
                                <path
                                    d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"></path>
                            </svg>
                        </a>

                        <form method="POST" action="{{route("banks.delete", $bank->id)}}">
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

        {{ $banks->links('vendor.pagination.bootstrap-5') }}

    </div>


@endsection

