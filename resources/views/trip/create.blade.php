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
    Add Trip
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
      <form method="post" action="{{ route('trips.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Title</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="name">Description</label>
              <input type="textarea" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="name">Start Date</label>
              <input type="date" class="form-control" name="start_date"/>
          </div>
          <div class="form-group">
              <label for="name">End Date</label>
              <input type="date" class="form-control" name="end_date"/>
          </div>
           <div class="form-group">
              <label for="name">Location</label>
              <input type="text" class="form-control" name="location"/>
          </div>
          <div class="form-group">
              <label for="name">Price</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Trip</button>
      </form>
  </div>
</div>
@endsection