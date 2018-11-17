@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Picture
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
      <form method="post" action="{{ route('pics.update', $pic->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
              @csrf
              <label for="trailId">Trail:</label>
              <input type="text" class="form-control" name="trailId"/>
        </div>
        <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
              <label for="path">Path:</label>
              <input type="text" class="form-control" name="path"/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection