@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Blog Film</h1>
   
  @if (session('deleted'))
     <div class="alert alert-success">
         <strong>{{ session('deleted') }}</strong>
         deleted successfully.
     </div>
  @endif

   @if ($films->isEmpty())
       <p>No post found yet. <a href="{{ route('admin.film.create') }}">Create a new one</a></p>
   @else
       <table class="table">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>TITLE</th>
                   <th>Category</th>
                   <th colspan="3">Actions</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($films as $film)
                   <tr>
                       <td>{{ $film->id}}</td>
                       <td>{{ $film->name}}</td>
                       <td>
                           @if($film->category)
                               <a href="{{ route('admin.category', $film->category->id)}}">{{ $film->category->name }}</a> 
                           @else 
                                Uncategorized
                           @endif
                       </td>
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
                            <form action="{{ route('admin.film.destroy', $film->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input class="btn btn-danger mt-2" type="submit" value="DELETE"/>
                            </form>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   @endif
</div>
@endsection
