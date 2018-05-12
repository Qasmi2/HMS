
{{-- @extends('Deshboard.deshboard-user') --}}
@extends('layouts.app')
@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-user') --}}
<div class="container">
    <div class="row justify-content-center">

            <div class="col-md-3" id="sidebar">
                    <div class="list-group">
                            <a href="http://ayanshani.com/user" class="list-group-item active">HOME</a>
                      {{-- <a href="#" class="list-group-item">Profile view</a>
                      <a href="#" class="list-group-item">Booking Request</a> --}}
                      
                      
                    </div>
            </div><!--/.sidebar-offcanvas-->
          
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-primary">Dashboard User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            
                            </div>
                        @endif

                        {{-- {{ Auth::user()->name }}
                        {{ Auth::user()->id }}
                        {{ Auth::user()->role }} --}}
                        
                        
                        
                        <div class="card">
                           <div class="card-header text-center bg-primary"><b>Searching Hostal</b></div>
                           <br /><br/>
                           
                           
                           <form method="POST" action="{{ route('search') }}">
                                @csrf
                                <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <input id="role" name="role" type="hidden" value="{{ Auth::user()->role }}">
                               
                               
                                
                                <br />
                                                <div class="col-md-offset-5 col-lg-offset-5">
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Search') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                <br/><br>
                            </form>
                        </div>
                                  

                            </div>
                            </div>

                    </div>
                </div>
            </div>
    </div>
</div>
@endsection