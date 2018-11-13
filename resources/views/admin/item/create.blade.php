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
                        <h4 class="card-title ">Add New Item</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label class="bmd-label-floating">Category</label>
                                <select name="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}} ">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Description</label>
                                <textarea name="description" class="form-control">
                                    </textarea>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

{{--@extends('layouts.app')--}}
{{--@section('title','Create')--}}
{{--@push('css')--}}
{{--@endpush--}}
{{--@section('content')--}}
    {{--@include('layouts.partial.sidebar')--}}
    {{--@include('layouts.partial.navbar')--}}


{{--@endsection--}}
{{--@push('scripts')--}}

{{--@endpush--}}

