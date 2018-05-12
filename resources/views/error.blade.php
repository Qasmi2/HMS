@include('flash')
<h1>Redirection</h1>
@if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                                <div class="alert alert-info">
                                    Successfull Performed 
                                    
                            </div>
                        @endif
<a class="btn btn-primary" href="http://ayanshani.com/">
    {{ __('Home Page') }} 
</a>


   
    

