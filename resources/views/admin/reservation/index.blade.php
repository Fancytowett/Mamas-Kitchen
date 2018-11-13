@extends('layouts.app')
@section('title','Reservation')
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
                    <a href="" class=" btn btn-info">Add new</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Reservations  </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-responsive" cellspacing="0"width="100%">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>

                                    <th>
                                      Time and Date
                                    </th>
                                    <th>
                                        Message
                                    </th>
                                    <th>
                                        Status
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
                                    @foreach($reservations as $key=>$reservation)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$reservation->name}}</td>
                                            <td>{{$reservation->email}}</td>
                                            <td>{{$reservation->phone}}</td>
                                            <td>{{$reservation->date_and_time}}</td>
                                            <td>{{$reservation->message}}</td>
                                            <td>@if($reservation->status==true)
                                                <span class="label label-info ">Confirmed</span>
                                                @else
                                                <span class=" label label-danger">Not confirmed yet </span>
                                                @endif
                                            </td>
                                            <td>{{$reservation->created_at}}</td>
                                            <td>{{$reservation->updated_at }}</td>
                                            <td> @if($reservation->status==false)
                                                <form method="POST" id="status-form-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" >
                                                    @csrf

                                                </form>
                                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you sure you to verify this requeat by phone?')){
                                                        event.preventDefault();
                                                        document.getElementById('status-form-{{$reservation->id}}').submit();}
                                                        else{
                                                        event.preventDefault();}">
                                                    <i class="material-icons">done</i></a>
                                                </button>
                                            </td>

                                            @endif
                                            <td><form method="POST" id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" >
                                                    @csrf
                                                    @method('DELETE')
                                                </form> <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$reservation->id}}').submit();}
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