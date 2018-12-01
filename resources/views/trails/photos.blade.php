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
          <td>City</td>
          <td>State</td>
          <td>Address</td>
          <td>Distance</td>
          <td>Duration</td>
          <td>Difficulty</td>
          <td>Pet Friendly</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$trail->name}}</td>
            <td>{{$trail->elevation}}</td>
            <td>{{$trail->city->name}}</td>
            <td>{{$trail->state->name}}</td>
            <td>{{$trail->address->address}}</td>
            <td>{{$trail->distance}}</td>
            <td>{{$trail->duration}}</td>
            <td>{{$trail->difficulty}}</td>
            <td>{{$trail->pet_friendly}}</td>
        </tr>
    </tbody>
  </table>
  @foreach($pics as $pic)
  <td>
      <img class="thumbnails" src="{{ URL::to ($pic->path) }}" alt="{{$pic->name}}" style="max-width:30%;height:auto;"></img>
  </td>
  @endforeach
<div>
@endsection