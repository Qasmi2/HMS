
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
                                <div class="card-header bg-success">property info</div>                
                        <div class="panel-body" style="padding:20px;">
                                <div class="row">
                                       
                                            <div class="col-lg-12 col-md-12 ">
                                           <center> <img id ="msimage"  src="data:BLOb - 5B/png;base64,{{$result['pic']}}" height= "100%" width="100%" ></center>
                                            </div>
                                            <br><br>

                                                <div class="col-lg-6 col-md-6"><label>Name:</label>
                                                   {{$result['propertyName']}}
                                                </div>
                                                <div class="col-lg-6 col-md-6"><label>Number of Room: </label>
                                                    {{$result['noOfRoom']}}
                                                 </div>
                                                 <div class="col-lg-6 col-md-6"><label>Sector: </label>
                                                    {{$result['sector']}}
                                                 </div>   
                                                 <div class="col-lg-6 col-md-6"><label>Address: </label>
                                                    {{$result['streetAddress']}}
                                                 </div>   
                                                 <div class="col-lg-6 col-md-6"><label>City </label>
                                                    {{$result['city']}}
                                                 </div>   
                                                 <div class="col-lg-12 col-md-12 bg-info">
                                                        <b style="color:whitesmoke;">Features</b>
                                                 </div>
                                                 <br /> <br/>
                                               
                                                 <div class="col-lg-6 col-md-6"><label>internet </label>
                                                    {{$result['internet']}}
                                                 </div>  

                                                 <div class="col-lg-6 col-md-6"><label>Mess </label>
                                                    {{$result['mess']}}
                                                 </div> 

                                                 <div class="col-lg-6 col-md-6"><label>lundary </label>
                                                    {{$result['lundary']}}
                                                 </div> 
                                                   
                                                 <div class="col-lg-6 col-md-6"><label>RoomCleaning </label>
                                                    {{$result['RoomCleaning']}}
                                                 </div> 
                                                            {{-- href="{{ url('/problems/' . $problem->id . '/edit') }}" --}}
                                                        {{-- <a href="{{ url('viewrooms'.$result[$i]['id']) }}" class="btn btn-primary" >View Rooms DetailDetail</a> --}}
                                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#test">View</button> --}}

                                                <br><br><br>
                                   
                                </div>
                                     <a href="{{ url('viewrooms/'.$result['id']) }}" class="btn btn-primary" >View Room Detail</a>
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