@extends('layouts.app')

@section('content')
<div class="container">
   <h1 class="mb-5">Create new post</h1>
 
   @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
   @endif
 
    <form action="{{route('admin.film.store')}}" method="POST">
       @csrf
 
       <div class="mb-3">
         <label for="title" class="form-label">Title</label>
         <input class='form-control mb-3' type="text" name="name" id="name" value="{{ old('name') }}">
         @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label for="images" class="form-label">Images</label>
         <textarea class="form-control mb-3" name="images" id="images" rows="6" value="{{ old('images') }}"></textarea>
         @error('images')
            <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label for="cast" class="form-label">Cast</label>
         <textarea class="form-control mb-3" name="cast" id="cast" rows="6" value="{{ old('cast') }}"></textarea>
         @error('cast')
            <div class="alert alert-danger">{{ $message }}</div>
         @enderror

         <div class="mb-3">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
               <option value="">Uncategorized</option>
               @foreach ($categories as $category)
               <option value="{{$category->id}}"
                  @if ($category->id == old('category_id')) selected @endif>
                  {{$category->name}}
               </option>
               @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         </div>

         <button class="btn btn-success" type="submit">SUBMIT</button>
       </div>
    </form>
    
 </div>
@endsection