@extends('layout.master-panel')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.error')
        </div>
        <div class="col-md-12">
            <a class="btn btn-danger pull-left" href="{{route('states.delete')}}">حذف خدمات</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <form action="{{route('states.create')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">نام مرحله</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{Request::old('name')}}">
                    </div>
                    <div class="form-group {{ $errors->has('discription') ? 'has-error' : '' }}">
                        <label for="name">خدمت مورد نظر</label>
                        <select name="service_id">
                            @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="name">چندمین مرحله</label>
                        <input class="form-control" type="text" name="position" id="name" value="{{Request::old('position')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
@endsection
