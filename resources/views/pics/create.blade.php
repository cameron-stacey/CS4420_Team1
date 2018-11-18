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
      <form method="post" action="{{ route('pics.store') }}">
          <body>
              <?php
                 echo Form::open(array('url' => '/uploadfile','files'=>'true'));
                 echo Form::file('image');
                 echo Form::submit('Upload File');
                 echo Form::close();
              ?>
           </body>
      </form>
  </div>
</div>
@endsection