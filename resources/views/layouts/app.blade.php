<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HMS') }}</title>

    <!-- Scripts -->
   
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS CDN -->
   
    <!-- Fonts -->
   
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/mobileview.css')}}" rel="stylesheet"> 
    <link href="{{ asset('deshboard/blog.css') }}" rel="stylesheet">

 <!-- google map -->
 <style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map_canvas { height: 100% }
</style>
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6v5-2uaq_wusHDktM9ILcqIrlPtnZgEk&sensor=false">
</script>
<script type="text/javascript">

    function initialize() {
        var myLatlng = new google.maps.LatLng(33.738045, 73.084488);
        var myOptions = {
            zoom:7,
            
            center: myLatlng,
            zoomControl:true,
            
            mapTypeId: google.maps.MapTypeId.ROADMAP
            
        }
        map = new google.maps.Map(document.getElementById("gmap"), myOptions);
        // marker refers to a global variable
        marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        // if center changed then update lat and lon document objects
        google.maps.event.addListener(map, 'center_changed', function () {
            var location = map.getCenter();
            document.getElementById("lat").innerHTML = location.lat();

            document.getElementById("lon").innerHTML = location.lng();
            // call function to reposition marker location
            placeMarker(location);
        });
        // if zoom changed, then update document object with new info
        google.maps.event.addListener(map, 'zoom_changed', function () {
            zoomLevel = map.getZoom();
            document.getElementById("zoom_level").innerHTML = zoomLevel;
        });
        // double click on the marker changes zoom level
        google.maps.event.addListener(marker, 'click', function () {
            zoomLevel = map.getZoom() + 1;
            if (zoomLevel == 20) {
                zoomLevel = 10;
            }
            document.getElementById("zoom_level").innerHTML = zoomLevel;
            map.setZoom(zoomLevel);
        });

        function placeMarker(location) {
            var clickedLocation = new google.maps.LatLng(location);
            marker.setPosition(location);
        }
		
		google.maps.event.addListener(map, "click", function(event) {
			// get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();

                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(5);
                document.getElementById("lon").value = clickLon.toFixed(5);

                  var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(clickLat,clickLon),
                        map: map
                     });
            });

            
		
    }
    window.onload = function () { initialize() };
</script>
     <style>
 div#gmap {
        width: 100%;
        height: 200px;
        border:double;
 }
    </style>

    <!-- google map -->

    
</head>
<body>

    <div id="app">
            
        
        <nav class="navbar navbar-expand-md navbar-default navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">
                    {{ config('app.name', 'HMS') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest    
                            {{-- <li><a class="nav-link" href="{{ route('reg') }}">{{ __('Register') }}</a></li>
                            <li><a class="nav-link" href="{{ route('logi') }}">{{ __('Login') }}</a></li> --}}
                        @else
                         
                            {{-- <li><a class="nav-link" href="#">{{ __('Account Setting') }}</a></li>
                            <li><a class="nav-link" href="#">{{ __('My Profile') }}</a></li> --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                         
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

      
        
        <main class="py-4">
                @include('flash')
            @yield('content')
        </main>
       

    </div>

</body>
</html>
