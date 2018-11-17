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
          <td>Trail</td>
          <td>Name</td>
          <td>Path</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pics as $pic)
        <tr>
            <td>{{$pic->trailId}}</td>
            <td>{{$pic->name}}</td>
            <td>{{$pic->path}}</td>
            <td><a href="{{ route('pics.edit',[$pic->id])}}" class="btn btn-primary">Edit</a></td>
            
            <td>
                <form action="{{ route('pics.destroy', [$pic->id])}}" method="post">
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