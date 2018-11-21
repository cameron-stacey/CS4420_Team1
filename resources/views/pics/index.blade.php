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
  <body>
    @foreach($pics as $pic)
    <tr>
      <img class="thumbnails" src="{{ URL::to ($pic->path) }}" alt="{{$pic->name}}">
        <td><a href="{{ route('pics.edit',[$pic->id])}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="{{ route('pics.destroy', [$pic->id])}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
      </img>
    </tr>
    @endforeach
  </body>
<div>
@endsection