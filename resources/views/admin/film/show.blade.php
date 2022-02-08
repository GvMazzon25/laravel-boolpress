@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-5">{{ $films->name }}</h1>
  <div class="mb-5">
        <a class="btn bt-warning" href="{{route('admin.film.edit', $films->id)}}">
          <button type="button" class="btn btn-warning">EDIT</button>
        </a>
        <a class="btn bt-success" href="{{route('admin.film.index')}}">
          <button type="button" class="btn btn-danger">ADD</button>
        </a>
  </div> 
  <div>
    <div class="card mb-3 m-auto" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{$films->img}}" class="img-fluid rounded-start" alt="{{$films->name}}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{$films->name}}</h5>
            <p class="card-text">{{$films->cast}}</p>
            <p class="card-text"><small class="text-muted">
              @if($films->is_available == 1)
                  Is Available
              @endif
            </small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection