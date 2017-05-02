@extends('includes.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.error')
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{route('permissions.create')}}">ایجاد دسترسی جدید</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <th rowspan="2">دسترسی ها</td>
                    <th rowspan="2">حذف </th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <form action="{{route('permissions.delete')}}" method="post">
                        <tr>
                            <td>{{$permission->discription}}</td>
                            <td>
                                <input type="hidden" name="id" value="{{$permission->id}}">
                                {{csrf_field()}}
                                <input type="submit" name="delete_permission" class="btn btn-danger" value="حذف دسترسی">
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
