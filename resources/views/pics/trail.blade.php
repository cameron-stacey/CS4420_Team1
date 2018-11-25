@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Select the file to upload.
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
      {!! Form::open(array('route' => array('pics.upload', $trail->id),'enctype' => 'multipart/form-data')) !!}
        <div class="row cancel">
          <div class="col-md-4">
            {!! Form::file('image', array('class' => 'image')) !!}
          </div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      {!! Form::close() !!}
  </div>
</div>
@endsection