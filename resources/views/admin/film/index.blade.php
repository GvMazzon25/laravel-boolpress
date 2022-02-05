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
                   <th></th>
               </tr>
           </thead>
           <tbody>

           </tbody>
       </table>
   @endif
</div>
@endsection
