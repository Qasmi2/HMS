
{{-- @extends('Deshboard.deshboard-user') --}}
@extends('layouts.app')

@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-user') --}}
<div class="container">
    <div class="row justify-content-center">

            <div class="col-md-3" id="sidebar">
                    <div class="list-group">
                    <a href="http://ayanshani.com/user" class="list-group-item active">HOME</a>
                      {{-- <a href="#" class="list-group-item">Booking status </a> --}}
                      
                      
                      
                    </div>
            </div><!--/.sidebar-offcanvas-->
          
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-primary">Booking status </div> 
                            <div class="card" >
                                <div class="card-header bg-success">{{$result}}</div>          
                                <h3></h3>   
                            </div>
                        </div>
                    </div>
                <div>
                          

            </div>
            </div>
            
    </div>
</div>
@endsection