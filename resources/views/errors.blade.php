@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger" role="alert">{{ $error }}</li>
        @endforeach
    </ul>

@endif
