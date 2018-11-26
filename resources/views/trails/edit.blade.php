@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Trail
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
      <form method="post" action="{{ route('trails.update', $trail->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
              <label for="elevation">Elevation:</label>
              <input type="text" class="form-control" name="elevation"/>
        </div>
        <div class="form-group">
              <label for="distance">Distance:</label>
              <input type="text" class="form-control" name="distance"/>
        </div>
        <div class="form-group">
              <label for="duration">Duration</label>
              <input type="text" class="form-control" name="duration"/>
        </div>
        <div class="form-group">
              <label for="difficulty">Difficulty</label>
              <input type="text" class="form-control" name="difficulty"/>
        </div>
        <div class="form-group">
              <label for="pet_friendly">Pet Friendly</label>
              <input type="radio" class="form-control" name="pet_friendly" value="yes" checked/> Yes<br>
              <input type="radio" class="form-control" name="pet_friendly" value="no"/> No
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection