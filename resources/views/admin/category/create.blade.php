

@extends('layouts.app')
@section('title','Create')
@push('css')
@endpush
@section('content')
    @include('layouts.partial.sidebar')
    @include('layouts.partial.navbar')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')

                    <div class="card">


                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('category.store')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('scripts')

@endpush

