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
          <td colspan="2">Photos</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$trail->name}}</td>
            <td>{{$trail->elevation}}</td>
            <td>{{$trail->location}}</td>
            <td>{{$trail->distance}}</td>
            <td>{{$trail->duration}}</td>
            <td>{{$trail->difficulty}}</td>
            <td>{{$trail->pet_friendly}}</td>
            <td><a href="{{ route ('trails.photos',[$trail->id])}}" class="btn btn-primary">View</a></td>
            <td><a href="{{ route ('pics.trail',[$trail->id])}}" class="btn btn-primary">Import</a></td>
    </tbody>
  </table>
  @foreach($comments as $comment)
  <td>
      <td>{{$comment->comment}}<br></td>
  </td>>
  @endforeach
  <td><a href="{{ route ('comments.trail',[$trail->id])}}" class="btn btn-success">Comment</a></td>
<div>
@endsection