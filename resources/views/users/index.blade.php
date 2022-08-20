@extends('layout')

@section('content')

    <div class=" px-4 ">
        <div class="form-group">
            <div class="row g-3">
                <div class="col-6">
                    <a href="{{route('users.create')}}" class="btn btn-primary">Добавить</a>
                </div>
                <div class="col-6">
                    @if($not_valid=='1')

                        <input class="form-check-input" type="checkbox" value="not_valid" id="crm-laravel-user-click" checked>
                    @else
                        <input class="form-check-input" type="checkbox" value="not_valid" id="crm-laravel-user-click">
                    @endif
                    <label class="form-check-label" for="crm-laravel-user-click">
                        Показать всех пользователей
                    </label>
                </div>
            </div>
        </div>

        <table class="table table-hover table-striped">
            <thead>
            <tr class="table-primary">
                <th scope="col">Фото</th>
                <th scope="col">ФИО</th>
                {{--<th scope="col">Должность</th> --}}
                <th scope="col">Email</th>
                <th scope="col">Телефон</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{asset("storage/". $user->avatar)}}" alt="avatar-image" class="img-responsive"
                             width="150">
                    </td>
                    <td>{{$user->name . ' ' . $user->lastname}}</td>
                    {{-- <td>{{'будет сделано позже'}}</td> --}}
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="fa fa-pencil">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-eyedropper" viewBox="0 0 16 16">
                                <path
                                    d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"></path>
                            </svg>
                        </a>

                        <form method="POST" action="{{route("users.delete", $user->id)}}">
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

        {{ $users->withQueryString()->links('vendor.pagination.bootstrap-5') }}
        {{--withQueryString() - это параметр для того, чтобы не пропадали Query-параметры --}}

    </div>

@endsection

