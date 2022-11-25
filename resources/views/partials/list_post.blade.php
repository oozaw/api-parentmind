<div class="row justify-content-center mb-3">
   <div class="col-md-6">
      <form action="/post">
         @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
         @endif

         @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
         @endif

         <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="keyword"
               value="{{ request('keyword') }}">
            <button class="btn btn-primary" type="submit" id="button-search">Search</button>
         </div>
      </form>
   </div>
</div>

@if ($posts->isEmpty())
   <p class="text-center fs-4">There are no posts yet!</p>
@else
   @if (request('page') === '1' or !request('page'))
      @include('partials.latest_post')
      @php
         $p = $posts->skip(1);
      @endphp
   @else
      @php
         $p = $posts;
      @endphp
   @endif

   <div class="container">
      <div class="row">
         @foreach ($p as $post)
            <div class="col-md-4 mb-3">
               <div class="card">
                  <div class="mb-1">
                     <div class="position-absolute rounded-end px-3 py-2" style="background-color: rgba(0, 0, 0, 0.6)">
                        <a href="/post?category={{ $post->categories[0]->slug }}"
                           class="text-white text-decoration-none">{{ $post->categories[0]->name }}</a>
                     </div>
                     @if ($post->image)
                        <div style="max-height: 500px; overflow: hidden">
                           <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                              alt="{{ $post->categories[0]->slug }}">
                        </div>
                     @else
                        <img src="https://source.unsplash.com/random/500x300?{{ $post->categories[0]->slug }}"
                           class="card-img-top" alt="{{ $post->categories[0]->slug }}">
                     @endif
                  </div>
                  <div class="card-body">
                     <h5 class="card-title">
                        <a class="text-decoration-none" href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                     </h5>
                     <p>
                        <small class="text-muted">By: <a class="text-decoration-none"
                              href="/post?author={{ $post->author->username }}"> {{ $post->author->name }}</a><br>
                           Last updated {{ $post->created_at->diffForHumans() }}</small>
                     </p>
                     <p class="card-text">{{ $post->excerpt }}.....</p>
                     <a href="/post/{{ $post->slug }}" class="btn btn-primary" role="button">Read More</a>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
   <div class="d-flex justify-content-center mt-4">
      {{ $posts->links() }}
   </div>
@endif
