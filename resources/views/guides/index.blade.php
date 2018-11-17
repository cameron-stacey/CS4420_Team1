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
          <td>Web Link</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($guides as $guide)
        <tr>
            <td>{{$guide->name}}</td>
            <td>{{$guide->url}}</td>
            <td><a href="{{ route('guides.edit',[$guide->id])}}" class="btn btn-primary">Edit</a></td>
            
            <td>
                <form action="{{ route('guides.destroy', [$guide->id])}}" method="post">
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