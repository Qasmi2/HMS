{{-- @extends('Deshboard.deshboard-Admin') --}}
@extends('layouts.app')
@include('flash')
@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-Admin') --}}
<div class="container">
    <div class="row justify-content-center">

                    

                <div class="col-md-3" id="sidebar">
                        <div class="list-group">
                          <a href="{{ route('addproperty') }}" class="list-group-item active">Add Your Properties </a>
                          {{-- <a href="{{ route('addroom') }}" class="list-group-item">Add Rooms</a> --}}
                          <a href="{{route ('viewproperties')}}" class="list-group-item">Booking Requests </a>
                          <a href="{{route ('viewproperties')}}" class="list-group-item">View Properties </a>
                          <!-- <a href="#" class="list-group-item">View Room </a>
                          <a href="#" class="list-group-item">Booked Room </a> -->
                          
                        </div>
                </div><!--/.sidebar-offcanvas-->
           <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard Admin</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            
                            </div>
                        @endif

                       
                        <div class="alert alert-info">
                            {{$result['error']}}
                        </div>
                   
                                
                       
                                  
                     </div>
                </div>
           </div>
    </div>
</div>
@endsection