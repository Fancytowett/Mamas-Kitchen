

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
{{--@section('title','slider')--}}
{{--@push('css')--}}
{{--@endpush--}}
{{--@section('content')--}}
    {{--@include('layouts.partial.sidebar')--}}
    {{--@include('layouts.partial.navbar')--}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')

                    <div class="card">


                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="bmd-label-floating">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating"> SubTitle</label>
                                    <input type="text" name="sub_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating"> Image</label>
                                    <input name="image" type="file"/>
                                </div>
                                <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

{{--@endsection--}}
{{--@push('scripts')--}}

{{--@endpush--}}
</body>
</html>
