@if(count($errors) > 0)
    <ul class="list-group">
        @foreach($errors->all() as $erro)
            <li class="list-group-item text-danger">
                {{ $erro }}
            </li>
        @endforeach
    </ul>
@endif
