@extends('layouts.main')

@section('container')
   <div class="container">
      <div class="row justify-content-center mb-5">
         <div class="col-md-10">
            <h3 class="mb-4">{{ $post->title }}</h3>
            <p>
               @if ($post->type == 'article')
                  Article
               @else
                  Video
               @endif
               by <a class="text-decoration-none" href="/post?author={{ $post->author->username }}">
                  {{ $post->author->name }}
               </a> in
               @foreach ($post->categories as $category)
                  <a href="/post?category={{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a>
                  @if (!$loop->last)
                     ,
                  @endif
               @endforeach
               from <a class="text-decoration-none" href="{{ $post->link }}" target="_blank">{{ $post->source }}</a>
               <br>
               <small class="text-muted">{{ $post->created_at->format('F d, Y') }}</small>
            </p>

            @if ($post->thumbnail)
               <div style="max-height: 500px; overflow: hidden">
                  <img src="{{ asset('storage/' . $post->thumbnail) }}" class="img-fluid rounded"
                     alt="{{ $post->categories[0]->slug }}">
               </div>
            @else
               <img src="/image/{{ $post->categories[0]->slug }}.jpg" class="img-fluid rounded"
                  alt="{{ $post->categories[0]->slug }}">
            @endif

            <article class="my-4 fs-5">
               <p>{!! $post->body !!}</p>
            </article>

            <a class="text-decoration-none" href="/post">Back to Posts</a>
         </div>
      </div>
   </div>
@endsection
