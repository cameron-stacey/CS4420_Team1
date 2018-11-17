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
          <td>Comment</td>
        </tr>
    </thead>
    <tbody>
        @foreach($trails as $trail)
        <tr>
            <td>{{$trail->comment}}</td>
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