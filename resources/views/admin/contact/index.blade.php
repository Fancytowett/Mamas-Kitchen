@extends('layouts.app')
@section('title','Contact ')
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
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Contact Messages</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table  " cellspacing="0" width="100%">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Sent At
                                    </th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key=>$contact)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->subject}}</td>
                                            <td>{{$contact->created_at}}</td>
                                            <td><a href="{{route('contact.show',$contact->id)}}" class=" btn  btn-sm   btn-info"><i class="material-icons">details</i> </a> </td>
                                            <td>
                                                <form method="POST" id="delete-form-{{$contact->id}}" action="{{route('contact.destroy',$contact->id )}}" >
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button  type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$contact->id}}').submit();}
                                                        else{
                                                            event.preventDefault();
                                                        }"> <i class="material-icons">delete</i></a>
                                                </button>
                                            </td>

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