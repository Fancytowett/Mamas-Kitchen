{{--@extends('layouts.app')--}}
{{--@section('title','slider')--}}
{{--@push('css')--}}
{{--@endpush--}}
{{--@section('content')--}}
{{--@include('layouts.partial.sidebar')--}}
{{--@include('layouts.partial.navbar')--}}
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')

                <div class="card">


                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Edit slider</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="bmd-label-floating">Title</label>
                                <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating"> SubTitle</label>
                                <input type="text" name="sub_title" class="form-control" value="{{$slider->sub_title}}">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating"> Image</label>
                                <input name="image" type="file"/>
                            </div>
                            <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>

{{--@endsection--}}
{{--@push('scripts')--}}

{{--@endpush--}}