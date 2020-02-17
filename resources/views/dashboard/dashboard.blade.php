<!-- resources/views/dashboard/dashboard.blade.php -->
@extends('index')
@section('title', 'Dashboard')
@section('content')
<div class="container text-center my-5">
	@if(Route::has('login'))
	      <div class="ml-auto">
	        @auth
	         <h2> <center> Welcome {{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : 'User' }}} {{{ isset(Auth::user()->last_name) ? Auth::user()->last_name : "" }}} ! </center></h2>
	        @endauth
	      </div>      
	    @endif
	    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manage your Reservations</h4>
                <p class="card-text">Modify your current reservations.</p>
                <a href="{{url('/dashboard/reservations')}}" class="btn btn-primary">My Reservations</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Find a Room</h4>
                <p class="card-text">Browse our catalog of top-rated hotels.</p>
                <a href="{{url('/')}}" class="btn btn-primary">Our Hotels</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection