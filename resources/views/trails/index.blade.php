@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Name</td>
          <td>Elevation</td>
          <td>Location</td>
          <td>Distance</td>
          <td>Duration</td>
          <td>Difficulty</td>
          <td>Pet Friendly</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($trails as $trail)
        <tr>
            <td><a href="{{ route('trails.show',[$trail->id,'comments'])}}" class="btn">{{$trail->name}}</a></td>
            <td>{{$trail->elevation}}</td>
            <td>{{$trail->location}}</td>
            <td>{{$trail->distance}}</td>
            <td>{{$trail->duration}}</td>
            <td>{{$trail->difficulty}}</td>
            <td>{{$trail->pet_friendly}}</td>
            <td><a href="{{ route('trails.edit',[$trail->id])}}" class="btn btn-primary">Edit</a></td>
            
            <td>
                <form action="{{ route('trails.destroy', [$trail->id])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection