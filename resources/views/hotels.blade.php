<!-- resources/views/hotels.blade.php -->
@extends('index')
@section('title', 'Hotels')
@section('content')

<div class="container my-5">
	@if(Route::has('login'))
	      <div class="ml-auto">
	        @auth
	            <a href="{{url('/dashboard')}}" class="btn btn-primary">Back</a>
    			 <br>
	         <h2> <center> Welcome {{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : 'User' }}} {{{ isset(Auth::user()->last_name) ? Auth::user()->last_name : "" }}} ! </center></h2>
	         @else
	         <h2> <center> Our offers ! </center></h2>
	        @endauth
	      </div>      
	    @endif
	    <br>
    <div class="row">
        <!-- Loop through hotels returned from controller -->
        @foreach ($hotels as $hotel)
        <div class="col-sm-4">
            <div class="card mb-3">
                <div style="background-image:url('{{ $hotel->image }}');height:300px;background-size:cover;" class="img-fluid" alt="Front of hotel"></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $hotel->name }}</h5>
                    <small class="text-muted">{{ $hotel->location }}</small>
                    <p class="card-text">{!!strlen($hotel->description) > 200 ? substr($hotel->description,0,200) : $hotel->description!!}</p>

                    @if (Route::has('login'))
				      <div class="ml-auto">
				        @auth
					   		<a href="../public/dashboard/reservations/create/{{ $hotel->id }}" class="btn btn-primary">Book Now</a>
				        @else
					  		<a href="{{route('login')}}" class="btn btn-primary">Book Now</a>
				        @endauth
				      </div>      
				    @endif
                </div>
            </div>  
        </div>
        @endforeach
    </div>
</div>
@endsection