@if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $erro)
                <li class="list-group-item  text-center text-danger">
                    {{$erro}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

