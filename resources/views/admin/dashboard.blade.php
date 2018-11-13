@extends('layouts.app')
@section('title','Dashboard')
@push('css')
    @endpush
@section('content')
    @include('layouts.partial.navbar')
    @include('layouts.partial.sidebar')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Catergory/ Item</p>
                            <h3 class="card-title">{{$categoryCount}}/{{$itemCount }}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">info</i>
                                <a href="#pablo">Total Categories and Items</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">slideshow</i>
                            </div>
                            <p class="card-category">Sliders</p>
                            <h3 class="card-title">{{$sliderCount}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> <a href="{{route('slider.index')}}"> Get more Details..</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Reservations</p>
                            <h3 class="card-title">{{$reservation->count() }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Not confirmed Reservartion
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Contact</p>
                            <h3 class="card-title">{{$contactCount}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        Phone
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
                                            <td>{{$reservation->phone}}</td>
                                            <td>@if($reservation->status==true)
                                                    <span class="badge badge-info ">Confirmed</span>
                                                @else
                                                    <span class="badge badge-danger">Not confirmed yet </span>
                                                @endif
                                            </td>

                                            <td> @if($reservation->status==false)
                                                    <form method="POST" id="status-form-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" >
                                                        @csrf

                                                    </form>
                                                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you sure you to verify this request by phone?')){
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
@include('layouts.partial.footer')
@endsection
@push('scripts')
    @endpush