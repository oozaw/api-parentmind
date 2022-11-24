@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">Post Category</h1>
   </div>

   @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-md-10" role="alert">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   @endif

   <a href="/dashboard/categories/create" class="btn btn-primary mb-3"><span data-feather="file-plus"></span> Create new
      category</a>

   <div class="table-responsive col-md-10">
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">No.</th>
               <th scope="col">Name</th>
               <th scope="col" class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($categories as $category)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="text-left ">{{ $category->name }}</td>
                  <td class="text-center">
                     <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-info m-1">
                        <span data-feather="list"></span>
                     </a>
                     <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning m-1">
                        <span data-feather="edit"></span>
                     </a>

                     {{-- Modal Trigger Button --}}
                     <button type="button" class="btn btn-danger text-dark m-1 border-0" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{ $category->id }}"><span data-feather="trash-2"></span></button>

                     <!-- Modal -->
                     <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                 <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">Are you sure want to delete the category?</div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                 <form action="/dashboard/categories/{{ $category->slug }}" method="POST"
                                    class="d-inline">
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
      </table>
   </div>
@endsection
