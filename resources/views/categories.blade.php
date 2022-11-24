@extends('layouts.main')

@section('container')
   <h2 class="mb-4 text-center">{{ $title }}</h2>   

   <div class="container">
      <div class="row">
         @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
               <a href="/post?category={{ $category->slug }}">
                  <div class="card bg-dark text-white">
                     <img src="https://source.unsplash.com/random/500x300?{{ $category->slug }}" class="card-img" alt="{{ $category->slug }}">
                     <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title w-100 position-absolute text-center flex-fill fs-3">{{ $category->name }}</h5>
                        <div class="card-img w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4)"></div> 
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
      </div>
   </div>
   
@endsection