@extends('includes.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.error')
        </div>
        <div class="col-md-12">
            <a class="btn btn-info" href="{{route('roles')}}">مدیریت نقش ها</a>
            <a class="btn btn-danger" href="{{route('roles.delete')}}">حذف نقش ها</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <form action="{{route('roles.create')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">نام نقش</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{Request::old('name')}}">
                    </div>
                    <div class="form-group {{ $errors->has('discription') ? 'has-error' : '' }}">
                        <label for="name">توضحیات</label>
                        <input class="form-control" type="text" name="discription" value="{{Request::old('discription')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
@endsection
