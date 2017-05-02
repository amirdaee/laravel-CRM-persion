@extends('layout.master-panel')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.error')
        </div>
        <div class="col-md-12">
            <a class="btn btn-info pull-left" href="{{route('orders.create')}}">ثبت سفارش جدید</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if($orders->isEmpty())
                هنوز هیچ سفارشی ثبت نشده است
            @else
            <table class="table table-hover">
                <thead>
                <tr style="vertical-align: middle;text-align: center;">
                    <th rowspan="2">سفارشات ثبت شده</td>
                    <th rowspan="2">بررسی مراحل و جزئیات</td>
                    <th rowspan="2">انصراف </th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <form action="{{route('orders.delete')}}" method="post">
                        <tr>
                            <td>{{$order->title}}</td>
                            <td><a class="btn btn-primary" href="{{route('orders',['id' => $order->id])}}">جزئیات</a></td>
                            <td>
                                <input type="hidden" name="id" value="{{$order->id}}">
                                {{csrf_field()}}
                                <input type="submit" name="delete_order" class="btn btn-danger" value="حذف سفارش">
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection
