@extends('layouts.main')

@section('container')
   <div class="d-block text-center">
      <h2 class="mb-4">About</h2>

      <h4>{{ $user->name }}</h4>
      <p>{{ $user->email }}</p>
      <img src="image/{{ $image }}" alt="{{ $user->name }}" width="200px" class="img-thumbnail rounded-circle">
   </div>

@endsection
