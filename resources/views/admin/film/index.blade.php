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
                       <td>{{ $film->name}}</td>
                       <td>
                            <a class="btn bt-success" 
                               href="{{route('admin.film.show', $film->id)}}">
                                     <button type="button" class="btn btn-primary">SHOW</button>
                            </a>
                       <td>
                            <a class="btn bt-success" 
                               href="{{route('admin.film.edit', $film->id)}}">
                                    <button type="button" class="btn btn-success">EDIT</button>
                            </a>
                       </td>
                       <td>
                            <a class="btn bt-success" 
                               href="{{}}">
                                    <button type="button" class="btn btn-danger">DELETE</button>
                            </a>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   @endif
</div>
@endsection
