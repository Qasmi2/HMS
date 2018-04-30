{{-- @extends('Deshboard.deshboard-Admin') --}}
@extends('layouts.app')
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
                            <div class="alert alert-dengeour">
                                {{ session('status') }}
                            
                            </div>
                        @endif

                       

                                <form method="POST" action="{{ route('veiwallproperty') }}">
                                @csrf
                                <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <input id="role" name="role" type="hidden" value="{{ Auth::user()->role }}">
                            
                                <br />
                                <div class="col-md-offset-5 col-lg-offset-5">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('View Properties') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                              
                               
                     </div>
                </div>
           </div>
    </div>
</div>
@endsection