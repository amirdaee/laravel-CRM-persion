@extends('layout.master-panel')

@section('content')
    @if($user = Auth::user())
        <input type="hidden" name="from_date" class="form-control" id="fromDate1" placeholder="تاریخ ..." data-mddatetimepicker="true" data-trigger="click" data-groupid="group1" data-fromdate="true" data-placement="bottom" value="{{jDateTime::convertFormatToFormat("Y/m/d","Y-m-d", date("Y-m-d",time()))}}" />
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="box box-info">
                        <header class="box-header"><h3>ثبت اضافه کاری</h3></header>
                        <div class="box-body">
                            <div class="container" style="max-width: 400px;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection