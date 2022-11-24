@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">Dashboard</h1>
   </div>

   @if (session()->has('loginSuccess'))
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
         {{ session('loginSuccess') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   @endif

@endsection
