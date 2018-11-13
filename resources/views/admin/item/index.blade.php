@extends('layouts.app')
@section('title','Item')
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
                    <a href="{{route('item.create')}}" class=" btn btn-info">Add new</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table  " cellspacing="0" width="100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>created_at</th>
                                    <th>Updated_at</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $key=>$item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td><img  class="img-responsive" style="height:100px; width:100px;" src="{{asset('uploads/item/'.$item->image)}}" alt=""></td>
                                            <td>{{$item->category->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->price}}</td>
                                              <td>{{$item->created_at}}</td>
                                            <td>{{$item->updated_at }}</td>
                                            <td><a href="{{route('item.edit',$item->id)}}" class=" btn  btn-sm   btn-info"><i class="material-icons">mode_edit</i> </a> </td>
                                            <td><form method="POST" id="delete-form-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" >
                                                    @csrf
                                                    @method('DELETE')
                                                </form> <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$item->id}}').submit();}
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