@extends('layout.login')

@section('content')
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="col-md-4 col-md-offset-4">
                <h2 style="text-align: center;">سامانه ثبت شرکت</h2>
                @include('includes.error')
                <div class="login-box">
                    <img style="width: 50%;" src="{{ route('account.image', ['filename' => 'logo.png']) }}">
                    <h3 style="border-bottom: 1px solid #000;">ورود</h3>
                    <form action="{{route('login')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group  {{ $errors->has('login_name') ? 'has-error' : '' }}">
                            <label for="studnet_id">نام کاربری</label>
                            <input class="form-control" type="text" name="login_name" value="{{Request::old('login_name')}}" >
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">کلمه عبور</label>
                            <input class="form-control" type="password" name="password" id="password" >
                        </div>
                        <button type="submit" class="btn btn-primary">ورود</button>
                    </form>
                    <a href="{{route('signup')}}">ثبت نام در سیستم</a>
                </div>
            </div>
        </div>
    </div>
@endsection
