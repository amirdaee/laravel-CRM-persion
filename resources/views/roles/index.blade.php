@extends('includes.dashboard')

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

            <div class="col-md-12">
                <a class="btn btn-info" href="{{route('roles.create')}}">ایجاد نقش جدید</a>
                <a class="btn btn-danger" href="{{route('roles.delete')}}">حذف نقش ها</a>
            </div>
            <table class="table table-hover">
                <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <th rowspan="2">نقش ها</td>
                    @foreach($permissions as $permission)
                        <th>{{$permission->name}}</th>
                    @endforeach
                    <th rowspan="2">تغییر دسترسی</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                <form action="{{route('permissions.change')}}" method="post">
                    <tr>
                        <td>{{$role->name}}</td>
                        @foreach($permissions as $permission)
                            <td><input name="permission[{{$permission->name}}]" type="checkbox" {{$role->hasPermissions($permission->name)?'checked':''}}></td>
                        @endforeach
                        <td>
                            <input type="hidden" name="id" value="{{$role->id}}">
                            {{csrf_field()}}
                            <input type="submit" name="change_permission" class="btn btn-primary" value="تغییر دسترسی">
                        </td>
                    </tr>
                </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
