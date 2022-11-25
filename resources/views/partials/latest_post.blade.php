<div class="card mb-5">
   <a href="/post/{{ $posts[0]->slug }}">
      @if ($posts[0]->image)
         <div style="max-height: 500px; overflow:hidden">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top"
               alt="{{ $posts[0]->categories[0]->slug }}">
         </div>
      @else
         <img src="https://source.unsplash.com/random/1200x500?{{ $posts[0]->categories[0]->slug }}" class="card-img-top"
            alt="{{ $posts[0]->categories[0]->slug }}">
      @endif
   </a>
   <div class="card-body text-center">
      <h3 class="card-title">
         <a class="text-decoration-none" href="/post/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
      </h3>
      <p>
         <small class="text-muted">By: <a class="text-decoration-none"
               href="/post?author={{ $posts[0]->author->username }}"> {{ $posts[0]->author->name }}</a> in <a
               href="/post?category={{ $posts[0]->categories[0]->slug }}"
               class="text-decoration-none">{{ $posts[0]->categories[0]->name }}</a><br> Last updated
            {{ $posts[0]->created_at->diffForHumans() }}</small>
      </p>
      <p>{{ $posts[0]->excerpt }}.....</p>
      <a class="btn btn-primary" href="/post/{{ $posts[0]->slug }}" role="button">Read More</a>
   </div>
</div>
