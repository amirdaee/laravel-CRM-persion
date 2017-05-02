@extends('layout.master-panel')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.error')
        </div>
        <div class="col-md-12">
            <a class="btn btn-info pull-left" href="{{route('services.create')}}">ایجاد خدمت جدید</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <th rowspan="2">خدمات</td>
                    <th rowspan="2">بررسی مراحل و جزئیات</td>
                    <th rowspan="2">حذف </th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <form action="{{route('services.delete')}}" method="post">
                        <tr>
                            <td><p style="font-weight: bold">{{$service->name}}</p><p>{{$service->discription}}</p></td>
                            <td><a class="btn btn-primary" href="{{route('services',['id' => $service->id])}}">جزئیات</a></td>
                            <td>
                                <input type="hidden" name="id" value="{{$service->id}}">
                                {{csrf_field()}}
                                <input type="submit" name="delete_service" class="btn btn-danger" value="حذف خدمت">
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
