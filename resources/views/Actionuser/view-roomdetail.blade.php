
{{-- @extends('Deshboard.deshboard-user') --}}
@extends('layouts.app')
@include('flash')
@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-user') --}}
<div class="container">
    <div class="row justify-content-center">

            <div class="col-md-3" id="sidebar">
                    <div class="list-group">
                    <a href="http://hms.com/user" class="list-group-item active">Deshboard</a>
                      <a href="#" class="list-group-item">Profile view</a>
                      <a href="#" class="list-group-item">Booking Request</a>
                      
                      
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

                        
                       
                                  
                        
                    
                        
                                
                        <div class="card" >
                                <div class="card-header bg-success">Rooms Details</div>   
                                
                                <div class="panel-body">
                                        <table class="table table-bordered table-striped">
                                            <thead bgcolor="#4CAF50">
                                                <tr>
                                                    <th>Room Id</th>
                                                    <th>Room Name</th>
                                                    <th>Room Type</th>
                                                    <th>Price</th>
                                                    <th>Available</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                           
                                            {{-- {{$result[0]['id']}} 
                                            {{$result[0]['propertyType']}} --}}
                                            
                                            <tbody>
                                                    @for ($i = 0; $i < sizeof($result1); $i++)

                                                    <tr>
                                                               <td>{{$result1[$i]['id']}}</td>
                                                            
                                                                <td>{{$result1[$i]['NameOfRoom']}}</td>
                                                                <td>{{$result1[$i]['roomType']}}</td>
                                                                <td>{{$result1[$i]['price']}}</td>
                                                                <td>{{$result1[$i]['availableRoom']}}</td>
                                                                
                                                                <td>
                                                                    <a href="*" class="btn btn-primary" >Booking</a>
                                                                       
                                                                </td>
                                                    </tr>
                                                    
                                                @endfor
                                                

                                            </tbody>
                                        </table>
                                      
                                    </div>

                        </div>
                              
                          
                        </div>
              
                    </div>
                    <div>
                          

                    </div>
                </div>
            </div>
    </div>
</div>
@endsection