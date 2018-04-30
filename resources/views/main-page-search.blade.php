
@extends('layout.master')
@include('flash')
@section('content')

<div class="card-body">
		@if (session('status'))
			<div class="alert alert-info">
				{{ session('status') }}
			
			</div>
		@endif
		  
</div>

		<!-- banner -->
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(500,750); } </script>

	<div id="home" class="w3ls-banner">
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top">

							<div class="container">
								<div class="agileits-banner-info">
								<h4>HOSTELS AND HOTELS GUIDE</h4>
									<h3>We know what you love</h3>
										<p>Welcome to Room Booking Portal </p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
			</div>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top1">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>HOSTELS AND HOTELS GUIDE</h4>
									<h3>Stay with friends & families</h3>
										<p>Come & enjoy precious moment with us</p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
			</div>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top2">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>HOSTELS AND HOTELS GUIDE</h4>
								<h3>want Study Room</h3>
										<p>Get Booking today</p>
									<div class="agileits_w3layouts_more menu__item">
											<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
										</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
		    <div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div>
	</div>	
	<!-- //banner --> 
<!--//Header-->
<!-- //Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<!-- Modal1 -->
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>Room Booking <span>Portal</span></h4>
										<img src="images/1.jpg" alt=" " class="img-responsive">
										<h5>We know what you love</h5>
										<p>Booking hostal and Resturent on a one click .</p>
									</div>
								</div>
							</div>
						</div>
<!-- //Modal1 -->
<div id="availability-agileits">
<div class="col-md-3 book-form-left-w3layouts">
	<h2><center>CHECK AVAILABILITY</center></h2>

</div>

<div class="col-md-9 book-form">
<h2><center style="color:white;margin-top:50px;">SEARCHING</center></h2>		
</div>
			<div class="clearfix"> </div>
</div>
<!-- Searching -->
<div class="about-wthree" id="about">
	<div class="container">	
		<div id="about">
			
				<div class="card">
                           <!-- <div class="card-header text-center bg-primary"><b>Searching Hostal / Resturent </b></div> -->
                          
                           <br /><br />
						   <div class="col-md-offset-5 col-lg-offset-5">
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                           <form method="POST" action="{{ route('searchfront') }}">
                                 @csrf
                                
                                <div class="form-group row">
                                            <!-- <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Search') }}</label> -->
                                                <div >
                                                    <select class="form-control" name="sector" id="sector" style="background-color:#0268a6;color:white;">
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
                                                                {{ __('Search by Sector') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
												
												
							</form>
</div>
</div>
</div>
                </div>
<!-- End searching -->
				   

<!-- Searching Univeristy  -->
<div class="card">
                           <!-- <div class="card-header text-center bg-primary"><b>Searching Hostal / Resturent </b></div> -->
                           
						   <br /><br />
						   <div class="col-md-offset-5 col-lg-offset-5">
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                           
                           <form method="POST" action="{{ route('searchuni') }}">
                                 @csrf
                                
                                <div class="form-group row">
                                            <!-- <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Search') }}</label> -->
                                                <div>
                                                    <select class="form-control" name="university" id="university"style="background-color:#0268a6;color:white; >
													<option value="">Select University</option>
													<option value="">Select University</option>
                                                        <option value="BAHRIA">BAHRIA University</option>
                                                        <option value="AIR">AIR University</option>
                                                        <option value="NUST">NUST University</option>
                                                        <option value="FAST">FAST University</option>
														<option value="ISLAMIC">ISLAMIC University</option>
														<option value="FEDRAL">FEDRAL University</option>
                                                        <option value="CASE">CASE University</option>
                                                        <option value="ABASYN">ABASYN University</option>
                                                        <option value="COMSAT">COMSAT University</option>
													 
                                                    </select>
                                                    @if($errors->has('university'))
                                                        <span class="Please Select a sector">
                                                            <strong>{{$errors->first('university')}}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                </div>
                                
                                <br />
                                                <div class="col-md-offset-5 col-lg-offset-5">
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Search by University') }}
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
<!-- End searching -->
<!-- End Searching Univeristy -->


<div class="container" style="background-color: white;  margin-top: 2em; ">
    <section class="">
                <div style="margin-bottom: 20px">
					<h5 style="text-align: center;margin-top: 1em;">REARCH RESULT</h5>
                </div>
               
               
				
				<div class="container mobile-view" > 
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marketingSourceDiv" style="padding: 0px 0px 0px 0px;" >
							<div id = "MSTitleDiv"  class="col-lg-3 col-md-3 ">
									
								<center><h4 class="title2">Picture </h4></center>
									
							</div>
							
							<div id = "MSTitleDiv"  class="col-lg-2 col-md-2 ">
									
								<center><h4 class="title2">Name </h4></center>
							
							</div>
							
							
							<div id = "MSTitleDiv"  class="col-lg-2 col-md-2 ">
							 
								<center><h4 class="title2">NO of Rooms</h4></center>

							</div>      

							<div id = "MSTitleDiv"  class="col-lg-2 col-md-2 ">
							 
								<center><h4 class="title2">Sectors</h4></center>

							</div>      

							<div id = "MSTitleDiv"  class="col-lg-3 col-md-3 ">
							 
									<center><h4 class="title2">VIEW Detail</h4></center>
	
							</div>
						</div>
					</div>
				</div>

				<hr style= "margin : 0px">	
				<br />

               
			   @for ($i = 0; $i < sizeof($result); $i++)
			   <div class="container" > 
				<div class="row">  

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marketingSourceDiv" style="padding: 0px 0px 0px 0px;" >

						<div id = "MSTitleDiv"  class="col-lg-3 col-md-3  col-sm-12 col-xs-12">                          
							<img id ="msimage"  src="https://www.w3schools.com/css/img_fjords.jpg" height= "100%" width="100%" >
						</div>
						
						<div id = "MSTitleDiv"  class="col-lg-2 col-md-2  col-sm-12 col-xs-12">                         

                                    <center><h4 class="title2">{{$result[$i]['propertyName']}}</h4></center>
						</div>
					   
						<div id = "MSTitleDiv"  class="col-lg-2 col-md-2  col-sm-12 col-xs-12">
							
							<center><h4 class="title2">{{$result[$i]['noOfRoom']}}</h4></center>
						</div>      

						<div id = "MSTitleDiv"  class="col-lg-2 col-md-2  col-sm-12 col-xs-12">
							
							<center><h4 class="title2">{{$result[$i]['sector']}}</h4></center>
						</div>      

							
						<div id = "MSTitleDiv"  class="col-lg-3 col-md-3  col-sm-12 col-xs-12" style="padding-left:90px;">
							
							<a href="{{ url('viewproperty/'.$result[$i]['id']) }}" class="btn btn-primary" >View Detail</a>
						</div>
					</div>
                    
                       
							</div>
						</div>
                    	<hr style= "margin : 0px">
				@endfor
			
		 </section>
		
				 
		 </div> 
		</div>




<!-- Gallery -->
<section class="portfolio-w3ls" id="gallery">
		 <h3 class="title-w3-agileits title-black-wthree">Our Gallery</h3>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g1.jpg" class="swipebox"><img src="images/g1.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>hostal room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g2.jpg" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>hostal room name</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g3.jpg" class="swipebox"><img src="images/g3.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4> features</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>rooms</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g5.jpg" class="swipebox"><img src="images/g5.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4> big room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g6.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>small rooms</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g7.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Bed Room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g8.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Family Room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
					<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g9.jpg" class="swipebox"><img src="images/g9.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>sigle room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g10.jpg" class="swipebox"><img src="images/g10.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4> double room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g2.jpg" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>room</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="clearfix"> </div>
</section>
<!-- //gallery -->
	
 
<!-- contact -->
<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Contact Us</h4>
				<p class="contact-agile2">Sign Up For Our News Letters</p>
				<form action="#" method="post" name="sentMessage" id="contactForm" novalidate>
					<div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">Full Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>	
                    <div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">Phone Number:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
							<p class="help-block"></p>
						</div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
							<p class="help-block"></p>
						</div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Send</button>	
				</form>            
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Connect With Us</h4>
			<p class="contact-agile1"><strong>Phone :</strong> +92 334 2222333</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">info@example.com</a></p>
			<p class="contact-agile1"><strong>Address :</strong> Bahria Univerity Islambad </p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
							</ul>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3074.7905052320443!2d-77.84987248482734!3d39.586871613613056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c9f6a80ccf0661%3A0x7210426c67abc40!2sVirginia+Welcome+Center%2FSafety+Rest+Area!5e0!3m2!1sen!2sin!4v1485760915662" ></iframe>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->
			<div class="copy">
		        <p>© 2018 Room Booking  Power  by  <a href="https://www.bahria.edu.pk">Bahria Univeristy Islambad </a> </p>
			</div>
			
@endsection
