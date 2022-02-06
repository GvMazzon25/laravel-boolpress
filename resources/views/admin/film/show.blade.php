@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-5">{{ $films->name }}</h1>
  <div class="mb-5">
         <a class="btn bt-warning" href="{{route('admin.film.edit', $films->id)}}">EDIT</a>
         <a class="btn bt-success" href="{{route('admin.film.index')}}">Add Film</a>
  </div> 
  
</div>
@endsection