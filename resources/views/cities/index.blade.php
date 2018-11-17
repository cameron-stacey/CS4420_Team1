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
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            <td>{{$city->name}}</td>
            <td><a href="{{ route('cities.edit',[$city->id])}}" class="btn btn-primary">Edit</a></td>
            
            <td>
                <form action="{{ route('cities.destroy', [$city->id])}}" method="post">
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