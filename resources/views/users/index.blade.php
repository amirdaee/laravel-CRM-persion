@extends('layout.master-panel')

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if(session()->has('message'))
                <div class="row">
                    <div class="btn btn-success">
                        {{session('message')}}
                    </div>
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <th rowspan="2">نام</td>
                    <th rowspan="2">نام کاربری</th>
                    <th colspan="{{count($roles)}}" style="text-align: center">نقش ها</th>
                    <th rowspan="2">به روز رسانی</th>
                    <th rowspan="2">حذف کاربر</th>
                </tr>
                <tr style="text-align: center">
                    @foreach($roles as $role)
                        <th style="text-align: center">{{$role->name}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)

                    <tr>
                        <form action="{{route('roles.change')}}" method="post">
                            <td>{{$user->name}}</td>
                            <td>{{$user->login_name}}</td>
                            @foreach($roles as $role)
                                <td style="text-align: center"><input name="role[{{$role->name}}]" type="checkbox" {{$user->hasRoles($role->name) ?'checked':''}}></td>
                            @endforeach
                            <td>

                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="submit" name="change_role" class="btn btn-primary" value="تغییر نقش">
                                {{csrf_field()}}

                            </td>
                        </form>
                        <td>
                            <form method="post" action="{{route('users')}}">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                {{csrf_field()}}
                                <input type="submit" name="delete_user" class="btn btn-danger" value="حذف کاربر">
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
