{{-- @extends('Deshboard.deshboard-user') --}}
@extends('layouts.app')
@include('flash')
@section('content')
{{-- @include('Deshboard.Deshboard-sidebar-user') --}}
<div class="container">
    <div class="row justify-content-center">

            <div class="col-md-3" id="sidebar">
                    <div class="list-group">
                      <a href="http://ayanshani.com/" class="list-group-item active">HOME</a>
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
                        
                        <div class="jumbotron">
                               <center> <h1>Wellcome  {{ Auth::user()->name }} </h1>
                                <p>Book Room on a one Click </p></center>
                        </div>
                        
                        <div class="card">
                           <div class="card-header text-center bg-primary"><b>Searching Hostal</b></div>
                           <br /><br/>
                           
                           
                           <form method="POST" action="{{ route('searchfront') }}">
                                @csrf
                                <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <input id="role" name="role" type="hidden" value="{{ Auth::user()->role }}">
                                <div class="form-group row">
                                            <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Search') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="sector" id="sector" >
                                                        <option value="">Select Sector</option>
                                                        <option value="Pakistan-Secretariat">Pakistan Secretariat</option>
                                                        <option value=" Diplomatic-Enclave">Diplomatic Enclave</option>
                                                        <option value=" A-18,Islamabad">A-18, Islamabad</option>
                                                        <option value="B-17,Islamabad">B-17, Islamabad </option>
                                                        <option value=" B-18,Islamabad">B-18, Islamabad</option>
                                                        <option value=" C-15,Islamabad">C-15, Islamabad</option>
                                                        <option value=" C-16,Islamabad">C-16, Islamabad</option>
                                                        <option value=" C-18,Islamabad">C-18, Islamabad</option>
                                                        <option value=" D-10,Islamabad">D-10, Islamabad</option>
                                                        <option value=" D-11,Islamabad">D-11, Islamabad</option>
                                                        <option value=" D-12,Islamabad">D-12, Islamabad</option>
                                                        <option value=" A-17,Islamabad">A-17, Islamabad</option>
                                                        <option value=" D-13,Islamabad">D-13, Islamabad</option>
                                                        <option value=" D-14,Islamabad">D-14, Islamabad</option>
                                                        <option value=" D-15,Islamabad">D-15, Islamabad</option>
                                                        <option value="D-16,Islamabad">D-16, Islamabad</option>
                                                        <option value=" D-17,Islamabad">D-17, Islamabad</option>
                                                        <option value=" D-18,Islamabad">D-18, Islamabad</option>
                                                        <option value=" E-7,Islamabad">E-7, Islamabad</option>
                                                        <option value=" E-8,Islamabad">E-8, Islamabad</option>
                                                        <option value="E-9,Islamabad">E-9, Islamabad</option>
                                                        <option value=" E-10,Islamabad">E-10, Islamabad</option>
                                                        <option value="E-11,Islamabad">E-11, Islamabad</option>
                                                        <option value=" E-12,Islamabad">E-12, Islamabad</option>
                                                        <option value=" E-13,Islamabad">E-13, Islamabad</option>
                                                        <option value=" E-14,Islamabad">E-14, Islamabad</option>
                                                        <option value=" E-15,Islamabad">E-15, Islamabad</option>
                                                        <option value="E-16,Islamabad">E-16, Islamabad</option>
                                                        <option value="E-17,Islamabad">E-17, Islamabad</option>
                                                        <option value=" E-18,Islamabad">E-18, Islamabad</option>
                                                        <option value=" F-6,Islamabad">F-6, Islamabad</option>
                                                        <option value=" F-6,Islamabad">F-6, Islamabad</option>
                                                        <option value="F-7,Islamabad">F-7, Islamabad</option>
                                                        <option value="F-8,Islamabad">F-8, Islamabad</option>
                                                        <option value=" F-9,Islamabad">F-9, Islamabad</option>
                                                        <option value=" F-10,Islamabad">F-10, Islamabad</option>
                                                        <option value=" F-11,Islamabad">F-11, Islamabad</option>
                                                        <option value="F-12,Islamabad">F-12, Islamabad</option>
                                                        <option value="F-13,Islamabad">F-13, Islamabad</option>
                                                        <option value="F-14,Islamabad">F-14, Islamabad</option>
                                                        <option value=" F-15,Islamabad">F-15, Islamabad</option>
                                                        <option value=" F-16,Islamabad">F-16, Islamabad</option>
                                                        <option value="F-17,Islamabad">F-17, Islamabad</option>
                                                        <option value=" F-18,Islamabad">F-18, Islamabad</option>
                                                        <option value="G-5,Islamabad">G-5, Islamabad</option>
                                                        <option value="G-6,Islamabad">G-6, Islamabad</option>
                                                        <option value="G-7,Islamabad">G-7, Islamabad</option>
                                                        <option value="G-8,Islamabad">G-8, Islamabad</option>
                                                        <option value="G-9,Islamabad ">G-10, Islamabad</option>
                                                        <option value=" G-11,Islamabad">G-11, Islamabad</option>
                                                        <option value=" G-12,Islamabad">G-12, Islamabad</option>
                                                        <option value=" G-13,Islamabad">G-13, Islamabad</option>
                                                        <option value="G-14,Islamabad">G-14, Islamabad</option>
                                                        <option value=" G-15,Islamabad">G-15, Islamabad</option>
                                                        <option value = "G-16,Islamabad">G-16, Islamabad</option>
                                                        <option value="G-17,Islamabad">G-17, Islamabad</option>
                                                        <option value="G-18,Islamabad">G-18, Islamabad</option>
                                                        <option value="H-8,Islamabad">H-8, Islamabad</option>
                                                        <option value="H-9,Islamabad">H-9, Islamabad</option>
                                                        <option value=" H-10,Islamabad">H-10, Islamabad</option>
                                                        <option value = "H-11,Islamabad">H-11, Islamabad</option>
                                                        <option value="H-12,Islamabad">H-12, Islamabad</option>
                                                        <option value="H-13,Islamabad">H-13, Islamabad</option>
                                                        <option value="H-16,Islamabad">H-16, Islamabad</option>
                                                        <option value="H-17,Islamabad">H-17, Islamabad</option>
                                                        <option value=" H-18,Islamabad">H-18, Islamabad</option>
                                                        <option value = "I-8,Islamabad">I-8,Islamabad</option>
                                                        <option value="I-10,Islamabad">I-10, Islamabad</option>
                                                        <option value="I-11,Islamabad">I-11, Islamabad</option>
                                                        <option value="I-12,Islamabad">I-12, Islamabad</option>
                                                        <option value="I-13,Islamabad">I-13, Islamabad</option>
                                                        <option value=" I-14,Islamabad">I-14, Islamabad</option>
                                                        <option value = "I-15,Islamabad">I-15, Islamabad</option>
                                                        <option value="I-16,Islamabad">I-16, Islamabad</option>
                                                        <option value="I-17,Islamabad">I-17, Islamabad</option>
                                                        <option value="I-18,Islamabad">I-18, Islamabad</option>
                                                        <option value = "khanapull">Khana Pull </option>
                                                                <option value="margallatown">Margalla Town</option>
                                                                <option value="tarmari">Tarmari</option>
                                                                <option value="alipur">Ali-Pur</option>
                                                    </select>
                                                    @if($errors->has('sector'))
                                                        <span class="Please Select a sector">
                                                            <strong>{{$errors->first('sector')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                </div>
                                
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
@endsection