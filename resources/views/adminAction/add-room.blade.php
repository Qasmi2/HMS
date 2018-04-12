{{-- @extends('Deshboard.deshboard-Admin') --}}
@extends('layouts.app')
@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-Admin') --}}
<div class="container">
    <div class="row justify-content-center">
        

                <div class="col-md-3" id="sidebar">
                        <div class="list-group">
                          <a href="{{ route('addproperty') }}" class="list-group-item active">Add Your Properties </a>
                          <a href="{{ route('addroom') }}" class="list-group-item">Add Rooms</a>
                          <a href="#" class="list-group-item">Booking Requests </a>
                          <a href="#" class="list-group-item">View Properties </a>
                          <a href="#" class="list-group-item">View Room </a>
                          <a href="#" class="list-group-item">Booked Room </a>
                          
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

                       
                                 {{-- {{ Auth::user()->id }} --}}
                                {{ Auth::user()->name }}
                                
                                {{ Auth::user()->role }}
                                 
                            
                                <div class="card">     
                                    <div class="card-header">{{ __('Add Room Form') }}</div>
                                        
                                     <div class="card-body">
                                        <form method="POST" action="{{ route('roomadd') }}">
                                             @csrf
                                             
                                             <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                             <input id="role" name="role" type="hidden" value="{{ Auth::user()->role }}">
                                             <div class="form-group row">
                                                <label for="roomType" class="col-md-4 col-form-label text-md-right">{{ __('Room Type') }}</label>
                    
                                                <div class="col-md-6">
                                                    <select class="form-control" name="roomType" id="roomType" >
                                                            <option value="">Room Type</option>
                                                            <option value="single room">Sigle Room</option>
                                                            <option value="double room">Double Room</option>
                                                            <option value="family room">Family Room</option>
                                                    </select>
                                                    @if($errors->has('roomType'))
                                                        <span class="Please Enter the Room Type Hostal/hotal">
                                                            <strong>{{$errors->first('roomType')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                        
                                                <div class="form-group row">
                                                    <label for="NameOfRoom" class="col-md-4 col-form-label text-md-right">{{ __('Room Name') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="NameOfRoom" type="text" placeholder="Enter your property name " class="form-control{{ $errors->has('NameOfRoom') ? ' is-invalid' : '' }}" name="NameOfRoom" value="{{ old('NameOfRoom') }}" required>
                        
                                                        @if ($errors->has('NameOfRoom'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('NameOfRoom') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row">
                                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price of Room') }}</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="price" type="number" placeholder="Enter price of the Room" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>
                        
                                                        @if ($errors->has('price'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                            <div class="form-group row">
                                                <label for="available" class="col-md-4 col-form-label text-md-right">{{ __('Available Y/N') }}</label>
                    
                                                <div class="col-md-6">
                                                    <select class="form-control" name="availableRoom" id="availableRoom" >
                                                            <option value="">Room Avilable </option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">NO</option>
                                                            
                                                    </select>
                                                    @if($errors->has('available'))
                                                        <span class="Please select the Room availiblity ">
                                                            <strong>{{$errors->first('available')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- get property id of this admin -->
                                            <div class="form-group row">
                                                    <label for="property-id " class="col-md-4 col-form-label text-md-right">{{ __('Property ID') }}</label>
                        
                                            <div class="col-md-6">
                                                    {{-- <select class="form-control" name="property-id" id="property-id" >
                                                            <option value="">Property Id  </option>
                                                            <option value="Hostal">get probackend</option>
                                                            <option value="Hotal">get rom backend</option>
                                                            
                                                    </select> --}}
                                                    <input id="property_id" type="text" placeholder="Enter your property id " class="form-control{{ $errors->has('property_id') ? ' is-invalid' : '' }}" name="property_id" value="{{ old('property_id') }}" required>


                                                    @if($errors->has('property_id'))
                                                        <span class="Please select the property ID ">
                                                            <strong>{{$errors->first('property_id')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                              
                                                <br />
                                                <div class="col-md-offset-5 col-lg-offset-5">
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Submit') }}
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
    </div>
</div>
@endsection