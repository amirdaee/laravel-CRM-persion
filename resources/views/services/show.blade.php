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

            <div class="col-md-12">
                <a class="btn btn-info" href="{{route('services.create')}}">ایجاد سرویس جدید</a>
                <a class="btn btn-danger" href="{{route('services.delete')}}">حذف سرویس ها</a>
                <a class="btn btn-primary" href="{{route('states.create')}}">ایجاد گام جدید</a>
            </div>
            @if(isset($service))
            <div class="col-md-6">
                <table class="table table-hover">
                    <thead>
                    <tr style="vertical-align: middle;text-align: center;">
                        <th colspan="4">{{$service->name}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service->states()->orderBy('position', 'ASC')->get() as $state)
                        <tr>
                            <td>{{$state->position}} - {{$state->name}}</td>
                            <td>
                                <form action="{{route('states.delete')}}" method="post">
                                    <input type="hidden" name="id" value="{{$state->id}}">
                                    {{csrf_field()}}
                                    <input type="submit" name="delete_state" class="btn btn-danger" value="حذف گام">
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    {{--@foreach($service->states()->orderBy('position', 'ASC')->get() as $state)--}}
                                {{--@if($loop->iteration%4 == 1)--}}
                                    {{--<tr>--}}
                                {{--@endif--}}
                                    {{--<td>{{$state->name}}</td>--}}
                                {{--@if(($loop->iteration)%4 == 0)--}}
                                    {{--</tr>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
@endsection
