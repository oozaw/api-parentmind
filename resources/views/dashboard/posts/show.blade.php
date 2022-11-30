@extends('dashboard.layouts.main')

@section('container')
   <div class="container my-4">
      <div class="row">
         <div class="col-lg-10">
            <h3 class="mb-2 ">{{ $post->title }}</h3>
            <p>
               <small class="text-muted">{{ $post->created_at->format('F d, Y') }} |
                  @if ($post->type == 'article')
                     Article
                  @else
                     Video
                  @endif |
                  @foreach ($post->categories as $category)
                     {{ $category->name }}
                     @if (!$loop->last)
                        ,
                     @endif
                  @endforeach
                  | <a class="text-decoration-none" href="{{ $post->link }}" target="_blank">{{ $post->source }}</a>
               </small>
            </p>

            <a class="btn btn-success" href="/dashboard/posts">
               <span data-feather="arrow-left"></span> Back
            </a>
            <a class="btn btn-warning mx-1" href="/dashboard/posts/{{ $post->slug }}/edit">
               <span data-feather="edit"></span> Edit
            </a>
            {{-- Delete Button --}}
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
               @method('delete')
               @csrf

               {{-- Modal Trigger Button --}}
               <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><span
                     data-feather="trash-2"></span> Delete</button>

               <!-- Modal -->
               <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                           <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">Are you sure want to delete the post?</div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                           <button type="submit" class="btn btn-danger">Confirm</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>

            @if ($post->thumbnail)
               <div style="max-height: 500px; overflow: hidden">
                  <img src="{{ asset('storage/' . $post->thumbnail) }}" class="img-fluid mt-3 rounded" alt="thumbnail">
               </div>
            @else
               <img src="https://source.unsplash.com/random/1200x500?{{ $post->categories[0]->slug }}"
                  class="img-fluid mt-3 rounded" alt="{{ $post->categories[0]->slug }}">
            @endif

            <article class="my-4 fs-5">
               <p>{!! $post->body !!}</p>
            </article>

            <a class="text-decoration-none" href="/dashboard/posts">Back to Posts</a>
         </div>
      </div>
   </div>
@endsection
