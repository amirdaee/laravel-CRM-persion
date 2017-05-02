@extends('layout.login')

@section('content')
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="col-md-4 col-md-offset-4">
                <h2 style="text-align: center;">سامانه ثبت شرکت</h2>
                @include('includes.error')
                <div class="login-box">
                    @can('create_user')
                        <div class="row">
                            <div style="padding: 20px;">
                                <a style="margin-top:40px;padding: 10px; color: #fff; background-color: #A1A638" href="{{route('home')}}">
                                    مشاهده سایت
                                </a>
                                <a style="margin:10px;padding: 10px; color: #fff; background-color: #259d6d" href="{{route('dashboard')}}">
                                    پنل مدیریت
                                </a>
                            </div>
                        </div>
                    @endcan
                    @cannot('create_user')
                            <img style="width: 50%;" src="{{ route('account.image', ['filename' => 'logo.png']) }}">
                    @endcannot
                    <h3 style="border-bottom: 1px solid #000;">ثبت نام در سامانه</h3>
                    <form action="{{route('signup')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">نام و نام خانوادگی</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{Request::old('name')}}">
                        </div>
                        <div class="form-group {{ $errors->has('login_name') ? 'has-error' : '' }}">
                            <label for="name">نام کاربری</label>
                            <input class="form-control" type="text" name="login_name" value="{{Request::old('login_name')}}">
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">ایمیل</label>
                            <input class="form-control error" type="text" name="email" value="{{Request::old('email')}}">
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label  for="password">کلمه عبور</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">ثبت نام</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection