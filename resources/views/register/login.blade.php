<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/front.css">
</head>
<body>
<main>
    {{-- <div class="container-fluid pb-3">
         <div class="d-grid gap-3" style="grid-template-columns: 1fr 2fr;">
             <div class="bg-light border rounded-3">
                 <div class="col-md-10">

                     @if(session('status'))
                         <div class="alert alert-danger">
                             {{session('status')}}
                         </div>
                     @endif

                     <h3 class="text-uppercase">Login</h3>
                     @include("errors")
                     <br>
                     <form class="row g-3" role="form" method="post" action="{{route('login')}}">
                         @csrf

                         <div class="col-12">
                             <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email" value="{{old('email')}}" >
                         </div>


                         <div class="col-md-10">
                             <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password">
                         </div>
                         <div class="col-md-10">
                             <button type="submit" class="btn btn-primary">Login</button>
                         </div>

                     </form>
                 </div>
             </div>
         </div>
     </div> --}}


    <div class="container-fluid pb-3">
        {{--  <div class="d-grid gap-3" style="grid-template-columns: 1fr 2fr;"> --}}
        {{--   <div class="bg-light border rounded-3"> --}}
        <br>
        <br>
        <br>
        <br>
        <div class="container crm-center-text">

            @if(session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
            @endif

            <h3 class="text-uppercase">Login</h3>
            @include("errors")
            <br> <br>


            <form class="row g-4" action="{{route('login')}}" method='POST'>
                @csrf

                <div class=" crm-center-text col-8 ">
                    <input type="text" class="form-control" id="email" name="email"
                           placeholder="Email" value="{{old('email')}}">
                </div>
                <div class=" crm-center-text col-8 ">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="password">
                </div>
                <br>
                <div class="col-8 crm-center-text">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        {{--    </div> --}}
        {{--  </div> --}}
    </div>
</main>

</body>
</html>







