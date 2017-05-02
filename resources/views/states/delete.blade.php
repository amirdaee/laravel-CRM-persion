@extends('layout.master-panel')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.error')
        </div>
        <div class="col-md-12">
            <a class="btn btn-info pull-left" href="{{route('states.create')}}">ایجاد گام جدید</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <th rowspan="2">خدمات</td>
                    <th rowspan="2">حذف </th>
                </tr>
                </thead>
                <tbody>
                @if(isset($state))
                    <form action="{{route('states.delete')}}" method="post">
                        <tr>
                            <td>
                                <p style="font-weight: bold">{{$state->name}}</p>
                                <p>{{$state->discription}}</p>
                                <p>{{$state->serviceName()}}</p>
                                <p>قدم: {{$state->position}}</p>
                                <p>{{$state->created_at}}</p>
                            </td>

                            <td>
                                <input type="hidden" name="id" value="{{$state->id}}">
                                {{csrf_field()}}
                                <input type="submit" name="delete_role" class="btn btn-danger" value="حذف گام">
                            </td>
                        </tr>
                    </form>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
