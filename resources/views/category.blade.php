@extends('layouts.main')

@section('container')
   <h2 class="mb-4">Post Category: {{ $title }}</h2>

   @include('partials.list_post')
   
@endsection