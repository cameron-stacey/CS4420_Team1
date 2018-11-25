@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Explore</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
                        
                        <div class="links">
                            <a href="{{ route('trails.index') }}">Trails</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
