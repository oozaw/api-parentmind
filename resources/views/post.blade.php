@extends('layouts.main')

@section('container')
   <div class="container">
      <div class="row justify-content-center mb-5">
         <div class="col-md-10">
            <h3 class="mb-4">{{ $post->title }}</h3>
            <p>
               By: <a class="text-decoration-none" href="/post?author={{ $post->author->username }}">
                  {{ $post->author->name }}</a> in <a href="/post?category={{ $post->category->slug }}"
                  class="text-decoration-none">{{ $post->category->name }}</a><br>
               <small class="text-muted">{{ $post->created_at->format('F d, Y') }}</small>
            </p>

            @if ($post->image)
               <div style="max-height: 500px; overflow: hidden">
                  <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded"
                     alt="{{ $post->category->slug }}">
               </div>
            @else
               <img src="https://source.unsplash.com/random/1200x500?{{ $post->category->slug }}"
                  class="img-fluid rounded" alt="{{ $post->category->slug }}">
            @endif

            <article class="my-4 fs-5">
               <p>{!! $post->body !!}</p>
            </article>

            <a class="text-decoration-none" href="/post">Back to Posts</a>
         </div>
      </div>
   </div>


@endsection
