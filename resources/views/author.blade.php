@extends('layouts.main')

@section('container')
   <h2 class="mb-4">Post Author: {{ $title }}</h2>

   @include('partials.list_post')
   
@endsection