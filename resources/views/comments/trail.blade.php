@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Comment
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
      <form method="post" action="{{ route('comments.upload', $trail->id) }}">
          <div class="form-group">
              @csrf
              <label for="comment"></label>
              <input type="text" class="form-control" name="comment"/>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
      </form>
  </div>
</div>
@endsection