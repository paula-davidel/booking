@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Title</td>
          <td>Slug</td>
          <td>Description</td>
          <td>Start Date - End Date</td>
          <td>Location</td>
          <td>Price</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($trip as $trips)
        <tr>
            <td>{{$trips->title}}</td>
            <td>{{$trips->slug}}</td>
            <td>{!!strlen($trips->description) > 100 ? substr($trips->description,0,100) : $trips->description!!}</td>
            <td>{{$trips->start_date}} - {{$trips->end_date}}</td>
            <td>{{$trips->location}}</td>
            <td>{{$trips->price}}</td>
            <td class="text-center">
                <a href="{{ route('trips.edit', $trips->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('trips.destroy', $trips->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    <a href="{{ route('trips.create')}}" class="btn btn-primary btn-sm"">Create</a>
<div>
@endsection