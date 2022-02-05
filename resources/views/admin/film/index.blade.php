@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Blog Film</h1>
   
   @if ($films->isEmpty())
       <p>No post found yet. <a href="{{ route('admin.film.create') }}">Create a new one</a></p>
   @else
       <table class="table">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>TITLE</th>
                   <th colspan="3">Actions</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($films as $film)
                   <tr>
                       <td>{{ $film->id}}</td>
                       <td>{{ $film->title}}</td>
                       <td><button type="button" class="btn btn-primary"><a href="">SHOW</a></button></td>
                       <td><button type="button" class="btn btn-success">EDIT</button></td>
                       <td><button type="button" class="btn btn-danger">DELETE</button></td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   @endif
</div>
@endsection
