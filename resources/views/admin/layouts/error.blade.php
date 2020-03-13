@if(count($errors) > 0)

<ul class="list-group text-center">

    @foreach($errors->all() as $error)

        <li class="list-group-item text-danger">
            {{ $error }}
        </li>

    @endforeach

</ul>

@endif