@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $category->name }}</h1>

    @foreach ($category->films as $film)
      <article>
          <h3>{{ $film->name}}</h3>
          <a class="btn btn-success" href="{{route('admin.film.show', $film->id)}}">Show</a>
          <a class="btn btn-danger" href="{{route('admin.film.edit', $film->id)}}">Edit</a>
          <hr>
      </article>
    @endforeach
</div>
@endsection
