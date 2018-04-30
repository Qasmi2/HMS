
{{-- @extends('Deshboard.deshboard-user') --}}
@extends('layouts.app')

@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-user') --}}
<div class="container">
    <div class="row justify-content-center">

            <div class="col-md-3" id="sidebar">
                    <div class="list-group">
                    <a href="http://hms.com/user" class="list-group-item active">HOME</a>
                      {{-- <a href="#" class="list-group-item">Booking status </a> --}}
                      
                      
                      
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
                       
                          @if(!Auth::check())
                            <div class="alert alert-info">
                            
                                 To Room Booking you have to Register/login 
                                 <a href="http://hms.com/reg">Register</a>
                            </div>
                          @endif
                        <div class="card" >
                                <div class="card-header bg-success">Rooms Details</div>   
                                
                                <div class="panel-body table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead bgcolor="#4CAF50">
                                                <tr>
                                                    <th>Room Id</th>
                                                    <th>Room Name</th>
                                                    <th>Room Type</th>
                                                    <th>Price</th>
                                                    <th>Available</th>
                                                    <th>Booking</th>
                                                    <th>Booking Status</th>
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
                                                                @if($result1[$i]['availableRoom'] == 1 )
                                                                <td>Yes</td>
   
                                                                @endif
                                                                @if($result1[$i]['availableRoom'] == 0 )
                                                                <td> Booked </td>
   
                                                                @endif
                                                                
                                                                <td>
                                                              

                                                               @if (Auth::check()) 

                                                                <form method="POST" action="{{ route('booking1')}}">
                                                                    
                                                                        @csrf
                                                                       <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                                                       <input id="role" name="role" type="hidden" value="{{ Auth::user()->role }}">
                                                                       <input id="room_id" name="room_id" type="hidden" value="{{$result1[$i]['id']}}">
                                    
                                                                       
                                                                  
                                                                    <button type="submit" class="btn btn-primary">
                                                                            {{ __('Booking Request') }}
                                                                        </button>
                                                                
                                                                @endif
                                                            </form> 

                                                                </td>
                                                                <td>
                                                              

                                                                        @if (Auth::check()) 
         
                                                                         <form method="POST" action="{{ route('checkStatus')}}">
                                                                             
                                                                                 @csrf
                                                                                <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                                                                <input id="role" name="role" type="hidden" value="{{ Auth::user()->role }}">
                                                                                <input id="room_id" name="room_id" type="hidden" value="{{$result1[$i]['id']}}">
                                             
                                                                                
                                                                           
                                                                             <button type="submit" class="btn btn-primary">
                                                                                     {{ __('Booking Status') }}
                                                                                 </button>
                                                                         
                                                                         @endif
                                                                     </form> 
         
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