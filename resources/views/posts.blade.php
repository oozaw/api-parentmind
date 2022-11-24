@extends('layouts.main')

@section('container')
   <h2 class="mb-3 text-center">{{ $title }}</h2>
   
   @include('partials.list_post')
   
@endsection