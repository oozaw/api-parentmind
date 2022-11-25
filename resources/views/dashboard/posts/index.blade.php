@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">My Post</h1>
   </div>

   @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col" role="alert">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   @endif

   <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="file-plus"></span> Create new post</a>

   <div class="table-responsive col">
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">No.</th>
               <th scope="col">Title</th>
               <th scope="col" class="text-left">Category</th>
               <th scope="col" class="text-center">Action</th>
            </tr>
         </thead>
         @if (!$posts)
            <h3>There are no post yet!</h3>
         @else
            <tbody>
               @foreach ($posts as $post)
                  <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td class="text-left ">{{ $post->title }}</td>
                     <td class="text-left">
                        @foreach ($post->categories as $category)
                           {{ $category->name }}
                           @if ($loop->index == 2)
                              @if ($loop->count > 3)
                                 ...
                              @endif
                              @break
                           @else
                              ,
                           @endif
                        @endforeach
                     </td>
                     <td class="text-center">
                        <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info m-1">
                           <span data-feather="eye"></span>
                        </a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning m-1">
                           <span data-feather="edit"></span>
                        </a>

                        {{-- Modal Trigger Button --}}
                        <button type="button" class="btn btn-danger text-dark m-1 border-0" data-bs-toggle="modal"
                           data-bs-target="#deleteModal{{ $post->id }}"><span data-feather="trash-2"></span></button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                                    <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
                                 </div>
                                 <div class="modal-body">Are you sure want to delete the post?</div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                       data-bs-dismiss="modal">Cancel</button>
                                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                       @method('delete')
                                       @csrf
                                       <button onclick="return true" class="btn btn-danger">Confirm</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </td>
                  </tr>
               @endforeach

            </tbody>
         @endif
      </table>
   </div>
@endsection
