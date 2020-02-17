<!-- resources/views/dashboard/reservationCreate.blade.php -->
@extends('index')
@section('title', 'Create reservation')
@section('content')
<div class="container my-5">
	@if(Route::has('login'))
	      <div class="ml-auto">
	        @auth
	         <h2> <center> Welcome {{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : 'User' }}} {{{ isset(Auth::user()->last_name) ? Auth::user()->last_name : "" }}} ! </center></h2>
	        @endauth
	      </div>      
	    @endif
	    <br>
    <div class="card">
        <div class="card-header">
            <h2>{{ $hotelInfo->name }} - <small class="text-muted">{{ $hotelInfo->location }}</small></h2>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Book your stay now at the most magnificent resort in the world!</p>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="room">Room Type</label>
                            <select class="form-control" name="room_id">
                                @foreach ($hotelInfo->rooms as $option)
                                    <option value="{{$option->id}}">{{ $option->type }} - ${{ $option->price }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" placeholder="Number of guests">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="arrival">Arrival</label>
                            <input type="date" class="form-control" name="arrival" placeholder="03/21/2020">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="departure">Departure</label>
                            <input type="date" class="form-control" name="departure" placeholder="03/23/2020">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Book it</button>

                <input type="text" id="title" name="title" value="{{ $hotelInfo->name }}" hidden> 
                <input type="text" id="description" name="description" value="{{ $hotelInfo->description }}" hidden>
                <input type="text" id="location" name="location" value="{{ $hotelInfo->location }}" hidden>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
     <a href="{{url('/dashboard/reservations')}}" class="btn btn-lg btn-primary">My Reservations</a>
   </div>
</div>
@endsection