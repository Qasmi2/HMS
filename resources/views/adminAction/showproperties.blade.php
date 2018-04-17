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
                                                    <table class="table table-bordered">
                                                        <thead>
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
                                                                                    <form method="POST" action="{{ route('addroom') }}">
                                                                                            @csrf
                                                                                            <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                                                                            <input id="role" name="role" type="hidden" value="{{ Auth::user()->role }}">
                                                                                            <input id="role" name="role" type="hidden" value="{{$result[$i]['id']}}">
                                                                                        
                                                                                          
                                                                                                        <button type="submit" class="btn btn-primary">
                                                                                                            {{ __('Add Room') }}
                                                                                                        </button>
                                                                                            
                                                                                    </form>
                                                                            </td>
                                                                        </tr>
                                                                
                                                            @endfor
                                                            
        
                                                        </tbody>
                                                    </table>
                                                    <!-- Modal for showing delete confirmation -->
                                                    {{-- <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title" id="user_delete_confirm_title">
                                                                            Delete User
                                                                        </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure to delete this user? This operation is irreversible.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                        <a href="#" class="btn btn-danger">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    <!--end of modal-->
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