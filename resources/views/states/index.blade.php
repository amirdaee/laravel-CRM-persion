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
                    <th rowspan="2">گام ها</td>
                    <th rowspan="2">حذف </th>
                    @if(isset($states))
                        <th rowspan="2">گام ها</td>
                        <th rowspan="2">حذف </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(isset($state))
                    <tr>
                        <td>
                            <p style="font-weight: bold">{{$state->name}}</p>
                            <p>{{$state->discription}}</p>
                            <p>{{$state->serviceName()}}</p>
                            <p>قدم: {{$state->position}}</p>
                            <p>{{$state->created_at}}</p>
                        </td>

                        <td>
                            <form action="{{route('states.delete')}}" method="post">
                                <input type="hidden" name="id" value="{{$state->id}}">
                                {{csrf_field()}}
                                <input type="submit" name="delete_state" class="btn btn-danger" value="حذف گام">
                            </form>
                        </td>
                    </tr>
                @endif
                @if(isset($states))
                    @foreach($states as $state)
                            @if($loop->iteration%2 == 1)
                                <tr>
                                    @endif
                                    <td>
                                        <p style="font-weight: bold">{{$state->name}}</p>
                                        <p>{{$state->serviceName()}}</p>
                                    </td>
                                    <td>
                                        <a href="{{route('states.delete',['id' => $state->id])}}" class="btn btn-primary">اطلاعات بیشتر</a>
                                    </td>
                                    @if($loop->iteration%2 == 0)
                                </tr>
                            @endif
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
