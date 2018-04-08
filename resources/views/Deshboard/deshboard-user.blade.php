{{-- @extends('Deshboard.deshboard-user') --}}
@extends('layouts.app')
@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-user') --}}
<div class="container">
    <div class="row justify-content-center">

            <div class="col-md-3" id="sidebar">
                    <div class="list-group">
                      <a href="#" class="list-group-item active">Account Setting</a>
                      <a href="#" class="list-group-item">Profile view</a>
                      <a href="#" class="list-group-item">Booking Request</a>
                      
                      
                    </div>
            </div><!--/.sidebar-offcanvas-->
          
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            
                            </div>
                        @endif

                        {{-- {{ Auth::user()->name }}
                        {{ Auth::user()->id }}
                        {{ Auth::user()->role }} --}}
                        
                        <div class="jumbotron">
                                <h1>Wellcome  {{ Auth::user()->name }} </h1>
                                <p>Book Room on a one Click </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection