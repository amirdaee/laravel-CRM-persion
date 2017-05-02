@extends('includes.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.error')
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{route('roles.create')}}">ایجاد نقش جدید</a>
                <a class="btn btn-primary" href="{{route('roles')}}">مدیریت نقش ها</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <th rowspan="2">نقش ها</td>
                    <th rowspan="2">حذف </th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <form action="{{route('roles.delete')}}" method="post">
                        <tr>
                            <td>{{$role->discription}}</td>
                            <td>
                                <input type="hidden" name="id" value="{{$role->id}}">
                                {{csrf_field()}}
                                <input type="submit" name="delete_role" class="btn btn-danger" value="حذف نقش">
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
