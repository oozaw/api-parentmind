@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">Edit Category</h1>
   </div>

   <div class="col-md-8">
      <form method="POST" action="/dashboard/categories/{{ $category->slug }}" class="mb-5">
         @method('put')
         @csrf
         <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name"
               value="{{ old('name', $category->name) }}" autofocus>
            @error('name')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <input type="text" class="form-control" id="slug" name="slug" readonly
               value="{{ old('slug', $category->slug) }}" hidden>
         </div>
         <a href="/dashboard/categories" role="button" class="btn btn-secondary me-1">Cancel</a>
         <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
   </div>

   <script src="/js/script.js"></script>

@endsection
