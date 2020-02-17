@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('trips.update', $trip->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $trip->title }}"/>
          </div>
          <div class="form-group">
              <label for="name">Description</label>
              <input type="textarea" class="form-control" name="description" value="{{ $trip->description }}"/>
          </div>
           <div class="form-group">
              <label for="name">Start Date</label>
              <input type="text" class="form-control" name="start_date" value="{{ $trip->start_date }}"/>
          </div> 
          <div class="form-group">
              <label for="name">End Date</label>
              <input type="text" class="form-control" name="end_date" value="{{ $trip->end_date }}"/>
          </div>
          <div class="form-group">
              <label for="name">Location</label>
              <input type="text" class="form-control" name="location" value="{{ $trip->location }}"/>
          </div>
          <div class="form-group">
              <label for="name">Price</label>
              <input type="text" class="form-control" name="price" value="{{ $trip->price }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Trip</button>
      </form>
  </div>
</div>
@endsection