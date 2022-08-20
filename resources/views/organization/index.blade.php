@extends('layout')

@section('content')

    <div class="container">
        <div >
            <div>
                @include("errors")
            </div>

            <form action="{{route('organization.update', ['id'=> ($organization!=null) ? $organization->id : null] )}}"
                  method='POST' enctype="multipart/form-data">

                @if (array_key_exists('button',$_POST) )
                    {{'button'}}
                @endif

                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    @if($organization!=null and old('name')==null)
                        <input type="text" name="name" id="name" value="{{$organization->name}}"
                               placeholder="" class="form-control">
                    @elseif(old('name')!=null)
                        <input type="text" name="name" id="name" value="{{old('name')}}"
                               placeholder="" class="form-control">
                    @else
                        <input type="text" name="name" id="name" value=""
                               placeholder="" class="form-control">
                    @endif

                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Адрес</label>

                    @if($organization!=null and old('address')==null)
                        <input type="text" name="address" id="address" value="{{$organization->address}}"
                               placeholder="" class="form-control">
                    @elseif(old('address')!=null)
                        <input type="text" name="address" id="address" value="{{old('address')}}"
                               placeholder="" class="form-control">
                    @else
                        <input type="text" name="address" id="address" value=""
                               placeholder="" class="form-control">
                    @endif

                    {{-- <input type="text" name="address" id="address" value="{{($organization!=null)?$organization->address:''}}"
                            placeholder="">--}}
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>

                    @if($organization!=null and old('phone')==null)
                        <input type="text" name="phone" id="phone" value="{{$organization->phone}}"
                               placeholder="" class="form-control">
                    @elseif(old('phone')!=null)
                        <input type="text" name="phone" id="phone" value="{{old('phone')}}"
                               placeholder="" class="form-control">
                    @else
                        <input type="text" name="phone" id="phone" value=""
                               placeholder="" class="form-control">
                    @endif

                    {{--<input type="text" name="phone" id="phone" value="{{($organization!=null)?$organization->phone:''}}"
                           placeholder="">--}}
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    @if($organization!=null and old('email')==null)
                        <input type="text" name="email" id="email" value="{{$organization->email}}"
                               placeholder="" class="form-control">
                    @elseif(old('email')!=null)
                        <input type="text" name="email" id="email" value="{{old('email')}}"
                               placeholder="" class="form-control">
                    @else
                        <input type="text" name="email" id="email" value=""
                               placeholder="" class="form-control">
                    @endif

                    {{--<input type="text" name="email" id="$email"
                           value="{{($organization!=null)?$organization->email:''}}" placeholder="">--}}
                </div>

                <div class="mb-3">
                    <label for="unp" class="form-label">УНП</label>

                    @if($organization!=null and old('unp')==null)
                        <input type="text" name="unp" id="unp" value="{{$organization->unp}}"
                               placeholder="" class="form-control">
                    @elseif(old('unp')!=null)
                        <input type="text" name="unp" id="unp" value="{{old('unp')}}"
                               placeholder="" class="form-control">
                    @else
                        <input type="text" name="unp" id="unp" value=""
                               placeholder="" class="form-control">
                    @endif

                    {{-- <input type="text" name="unp" id="unp" value="{{($organization!=null)?$organization->unp:''}}" placeholder="">--}}
                </div>

                <div>
                    <button name="button" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection


