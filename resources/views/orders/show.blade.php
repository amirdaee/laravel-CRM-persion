@extends('layout.master-panel')

@section('content')
            @if(session()->has('message'))
                    <div class="btn btn-success">
                        {{session('message')}}
                    </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-info" href="{{route('services.create')}}">ثبت سفارش جدید</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            @if(isset($order))
                                <div class="col-md-6">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr style="vertical-align: middle;text-align: center;">
                                            <th colspan="4">{{$order->title}}</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>سفارش دهنده: </td>
                                            <td>{{$order->users()->first()->name}} </td>
                                        </tr>
                                        <tr>
                                            <td>دسته: </td>
                                            <td>{{$order->services()->first()->name}}</td>
                                            <td>تعداد مراحل</td>
                                            <td>{{$order->services()->first()->states()->get()->count()}}</td>
                                        </tr>
                                        <tr>
                                            <td>تاریخ سفارش: </td>
                                            <td>{{jDateTime::convertFormatToFormat("Y-m-d H:i:s","Y-m-d H:i:s",$order->created_at)}}</td>
                                            <td>تاریخ آخرین تغییر: </td>
                                            <td>{{jDateTime::convertFormatToFormat("Y-m-d H:i:s","Y-m-d H:i:s",$order->updated_at)}}</td>
                                        </tr>
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

                                <div class="col-md-10 col-md-offset-1">
                                    <div class="progress progress-dots">

                                        <a class="progress-start progress-dot">
                                            <span class="progress-label">ثبت سفارش</span>
                                        </a>
                                        @foreach($order->services()->first()->states()->orderby("position",'asc')->get() as $state)
                                        <div class="progress-bar {{$order->state >= $state->position ? '' : 'progress-bar-disabled'}}" style="width: {{(1/$order->services()->first()->states()->get()->count())*100}}%">
                                            <a class="progress-dot {{$order->state == $state->position ? 'progress-dot-green' : ''}}">
                                                <span class="progress-label">{{$state->name}}</span>
                                            <span class="sr-only">25%</span>
                                            </a>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                            <h3>
                                پیام های سیستم
                            </h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-12">

                                <div id="bar" class="progress progress-danger progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{($order->state/$order->services()->first()->states()->get()->count())*100}}%;"></div>
                                </div>

                                <ul class="timeline">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                <span class="bg-red" style="direction: ltr">
                                    {{jDateTime::convertFormatToFormat("Y-m-d","Y-m-d","2017-02-02")}}
                                </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header">بارگذاری مدارک مورد نیاز</h3>

                                            <div class="timeline-body">
                                                لطفا جهت انجام مراحل قانوی ثبت شرکت مدارک زیر را در سیستم بارگذاری کنید و مدارک مورد نظر را تأیید کنید.
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">بارگذاری فایل ها</a>
                                                <a class="btn btn-danger btn-xs">...</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->

                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
