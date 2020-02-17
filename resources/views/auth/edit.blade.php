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
      <form method="post" action="{{ route('users.update', $user->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">First Name</label>
              <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}"/>
          </div>
          <div class="form-group">
              <label for="name">Last Name</label>
              <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" value="{{ $user->password }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection