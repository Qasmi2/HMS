
{{-- @extends('Deshboard.deshboard-user') --}}
@extends('layouts.app')
@include('flash')
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

                        
                       
                                  
                        <div class="card" >
                                <div class="card-header bg-success">property info</div>                
                        <div class="panel-body" style="padding:20px;">
                                <div class="row">
                                       
                                            <div class="col-lg-12 col-md-12 ">
                                           <center> <img id ="msimage"  src="data:BLOb - 5B/png;base64,{{$result['pic']}}" height= "100%" width="100%" ></center>
                                            </div>
                                            <br><br>

                                                <div class="col-lg-6 col-md-6"><label><b>Name:</b></label>
                                                   {{$result['propertyName']}}
                                                </div>
                                                <div class="col-lg-6 col-md-6"><label><b>Number of Room:</b> </label>
                                                    {{$result['noOfRoom']}}
                                                 </div>
                                                 <div class="col-lg-6 col-md-6"><label><b>Sector:</b> </label>
                                                    {{$result['sector']}}
                                                 </div>   
                                                 <div class="col-lg-6 col-md-6"><label><b>Address:</b> </label>
                                                    {{$result['streetAddress']}}
                                                 </div>   
                                                 <div class="col-lg-6 col-md-6"><label><b>City:</b> </label>
                                                    {{$result['city']}}
                                                 </div>   
                                                 <div class="col-lg-6 col-md-6"><label><b>Contact Number:</b> </label>
                                                    {{$result['phoneNo']}}
                                                 </div>  
                                                 {{-- <div class="col-lg-6 col-md-6"><label><b>Latitutde</b> </label>
                                                    {{$result['lat']}}
                                                 </div>  
                                                 <div class="col-lg-6 col-md-6"><label><b>Longitude</b> </label>
                                                    {{$result['lon']}}
                                                 </div>   --}}
                                                 <div class="col-lg-12 col-md-12 bg-info">
                                                        <b style="color:whitesmoke;">Features</b>
                                                 </div>
                                                 <br /> <br/>
                                            
                                                 @if($result['internet'] == 1)
                                                    <div class="col-lg-6 col-md-6"><label>internet </label>
                                                        
                                                     </div> 
                                                 @endif
                                                 @if($result['parking'] == 1)
                                                     
                                                    <div class="col-lg-6 col-md-6"><label>Parking </label>
                                                       
                                                     </div> 
                                                 @endif

                                                 @if($result['mess'] == 1)
                                                     
                                                    <div class="col-lg-6 col-md-6"><label>Mess </label>
                                                        
                                                     </div> 
                                                 @endif
                                                 @if($result['TvCabel'] == 1)
                                                     
                                                    <div class="col-lg-6 col-md-6"><label>Tv-Cabel </label>
                                                       
                                                     </div> 
                                                 @endif
                                                 @if($result['RoomCleaning'] == 1)
                                                     
                                                 <div class="col-lg-6 col-md-6"><label>Room Cleaning </label>
                                                    
                                                  </div> 
                                                @endif
                                                @if($result['lundary'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>lundary </label>
                                                   
                                                 </div> 
                                                @endif
                                                @if($result['AirConditioning'] == 1)
                                                     
                                                    <div class="col-lg-6 col-md-6"><label>Air Conditioning  </label>
                                                        
                                                     </div> 
                                                @endif
                                                @if($result['IroningFacilities'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Ironing Facilities  </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['PrivateBathroom'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Private Bathroom  </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['Refrigerator'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Refrigerator </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['Telephone'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Telephone </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['AirportShuttle'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Airport Shuttle </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['Wardrobe'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Wardrobe </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['Towels'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Towels </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['Heating'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Heating </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['Restaurant'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Restaurant </label>
                                                    
                                                 </div> 
                                                @endif
                                                @if($result['Shower'] == 1)
                                                     
                                                <div class="col-lg-6 col-md-6"><label>Shower </label>
                                                    
                                                 </div> 
                                                @endif
                                                
                                                 
                                                

                                                
                                                   
                                                 
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