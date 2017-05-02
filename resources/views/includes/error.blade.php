@if(count($errors)>0)
    <ol class="alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ol>
@endif

@if(Session::has('message'))
    <ol class="alert-success">
        <li>{{Session::get('message')}}</li>
    </ol>
@endif
