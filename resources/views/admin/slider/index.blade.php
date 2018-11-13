@extends('layouts.app')
@section('title','slider')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
    @include('layouts.partial.sidebar')
    @include('layouts.partial.navbar')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('slider.create')}}" class=" btn btn-info">Add new</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All sliders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table  " cellspacing="0" width="100%">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                       Title
                                    </th>
                                    <th>
                                        Sub Title
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                      Created_at
                                    </th>
                                    <th>
                                        Updated_at
                                    </th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->sub_title}}</td>
                                            <td>{{$slider->image}}</td>
                                            <td>{{$slider->created_at}}</td>
                                            <td>{{$slider->updated_at }}</td>
                                            <td><a href="{{route('slider.edit',$slider->id)}}" class=" btn  btn-sm   btn-info"><i class="material-icons">mode_edit</i> </a> </td>
                                            <td><form method="POST" id="delete-form-{{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" >
                                                    @csrf
                                                    @method('DELETE')
                                                </form> <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$slider->id}}').submit();}
                                                        else{
                                                            event.preventDefault();
                                                        }"> <i class="material-icons">delete</i></a> </button></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "type="text/javascript"></script>

    {{--<script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>--}}
    <script>
        $(document).ready(function () {
            $.noConflict();
            var table = $('#table').DataTable();
        });
    </script>
@endpush