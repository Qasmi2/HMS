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
                    <div class="card-header">Property List</div>

                     <div class="card-body">
                        
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
                                                <div class="panel-body table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead bgcolor="#4CAF50">
                                                            <tr>
                                                                {{-- <th>Booking Room ID</th> --}}
                                                                <th> Room Type </th>
                                                                <th> Room Name </th>
                                                                <th>Price</th>
                                                                <th> </th>
                                                            </tr>
                                                        </thead>
                                                       
                                                      
                                                        
                                                        <tbody>
                                                        @for ($i = 0; $i < sizeof($result); $i++)
                                                                <tr> 
                                                               
                                                                {{-- <td> {{$result[$i]['id']}} </td> --}}
                                                                <td>  {{$result[$i]['roomType']}} </td>
                                                                <td>  {{$result[$i]['NameOfRoom']}} </td>
                                                                <td>  {{$result[$i]['price']}} </td>
                                                                <td>
                                                                        <a href="{{url('confirm/'.$result[$i]['id'])}}" class="btn btn-primary" >Confirm Booking </a>
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




