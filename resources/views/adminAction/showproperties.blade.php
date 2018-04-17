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
                          <a href="#" class="list-group-item">Booking Requests </a>
                          <a href="{{route ('viewproperties')}}" class="list-group-item">View Properties </a>
                          <a href="#" class="list-group-item">View Room </a>
                          <a href="#" class="list-group-item">Booked Room </a>
                          
                        </div>
                </div><!--/.sidebar-offcanvas-->
           <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Property List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                               
                            </div>
                        @endif
    
                             <!-- main content -->

                             <section class="content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-primary ">
                                                <div class="panel-heading clearfix">
                                                   
                                                    <div class="pull-right">
                                                        <a href="{{ route('addproperty') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> Add Your Properties</a>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="panel-body">
                                                    <table class="table table-bordered table-striped">
                                                        <thead bgcolor="#4CAF50">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Property Name</th>
                                                                <th>No. of Rooms</th>
                                                                <th>Sector</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                       
                                                        {{-- {{$result[0]['id']}} 
                                                        {{$result[0]['propertyType']}} --}}
                                                        
                                                        <tbody>
                                                                @for ($i = 0; $i < sizeof($result); $i++)

                                                                <tr>
                                                                           <td>{{$result[$i]['id']}}</td>
                                                                        
                                                                            <td>{{$result[$i]['propertyName']}}</td>
                                                                            <td>{{$result[$i]['noOfRoom']}}</td>
                                                                            <td>{{$result[$i]['sector']}}</td>
                                                                            
                                                                            <td>
                                                                                <a href="{{url('addroom/'.$result[$i]['id'])}}" class="btn btn-primary" >Add Room</a>
                                                                                   
                                                                            </td>
                                                                </tr>
                                                                
                                                            @endfor
                                                            
        
                                                        </tbody>
                                                    </table>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- row-->
                                </section>
                             <!-- End main content -->
                              
                          
                                
                     </div>
                </div>
           </div>
    </div>
</div>
@endsection




