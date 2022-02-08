@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-5">Create new post</h1>
   <form action="{{route('admin.film.store')}}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input class='form-control mb-3' type="text" name="title" id="title">
        <textarea class="form-control mb-3" name="content" id="content" rows="6"></textarea>
        <textarea class="form-control mb-3" name="content" id="content" rows="6"></textarea>
        <button class="btn btn-success" type="submit">SUBMIT</button>
      </div>
   </form>
   
</div>
@endsection