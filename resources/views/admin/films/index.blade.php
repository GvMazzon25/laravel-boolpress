@extends('layouts.app')

@section('content')
<div class="container">
  <h1></h1>
    <ul class=" ">
        @foreach ($films as $film)
        <div class="card m-3" style="width: 18rem;">
            <img src="{{ $film->images }}" class="card-img-top" alt="{{ $film->name }}">
            <div class="card-body">
              <h5 class="card-title">{{ $film->name }}</h5>
              <p class="card-text">{{ $film->cast }}</p>
              <h5 class="card-title">{{ $film->is_available }}€</h5>
            </div>
          </div>
        @endforeach
    </ul>
</div>
@endsection
