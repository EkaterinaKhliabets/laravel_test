@extends('layout')

@section('content')

    <div class=" px-4 ">

        <div class="form-group">
            <div class="row g-3">
                <div class="col-6">
                    <a href="{{route('clients.create')}}" class="btn btn-primary">Добавить</a>
                </div>
                <div class="col-6">
                    <select class="form-select crm-user-filter" id="user_id" name="user_id" aria-label="Default select example">

                        @if(!\Illuminate\Support\Facades\Auth::user()->is_admin)
                            @foreach($users as $user)
                                @if(\Illuminate\Support\Facades\Auth::user()->id==$user->id)
                                    <option value="{{$user->id}}" selected >{{$user->name . ' ' . $user->lastname}}</option>
                                @endif
                            @endforeach
                        @elseif(\Illuminate\Support\Facades\Auth::user()->is_admin)
                            <option selected>Основной менеджер</option>
                            @foreach($users as $user)
                                @if($user_id==$user->id)
                                    <option value="{{$user->id}}" selected >{{$user->name . ' ' . $user->lastname}}</option>
                                @else
                                    <option value="{{$user->id}}"  >{{$user->name . ' ' . $user->lastname}}</option>
                                @endif
                            @endforeach
                        @endif

                    </select>
                </div>
            </div>

        </div>

        <div class="row g-3">
            <table class="table table-hover table-striped">
                <thead>
                <tr class="table-primary">
                    <th scope="col">Название</th>
                    <th scope="col">Основной менеджер</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->user->name  . ' ' .  $client->user->lastname}}</td>
                        <td>
                            <a href="{{route('clients.edit', $client->id)}}" class="fa fa-pencil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-eyedropper" viewBox="0 0 16 16">
                                    <path
                                        d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"></path>
                                </svg>
                            </a>

                            <form method="POST" action="{{route("clients.delete", $client->id)}}">
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
            {{ $clients->withQueryString()->links('vendor.pagination.bootstrap-5') }}
        </div>

    </div>

@endsection
