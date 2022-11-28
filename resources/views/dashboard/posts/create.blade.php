@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h3">Create New Post</h1>
   </div>

   <div class="col-md-8">
      <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
         @csrf
         <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
               value="{{ old('title') }}" autofocus>
            @error('title')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type" required>
               <option selected disabled hidden value="">-- Select type --</option>
               @if (old('type') == 'article')
                  <option value="article" selected>Artikel</option>
                  <option value="video">Video</option>
               @elseif (old('type') == 'video')
                  <option value="article">Artikel</option>
                  <option value="video" selected>Video</option>
               @else
                  <option value="article">Artikel</option>
                  <option value="video">Video</option>
               @endif
            </select>
            @error('type_id')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3" hidden>
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
               readonly value="{{ old('slug') }}">
            @error('slug')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            @foreach ($categories as $category)
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="{{ "category_$category->id" }}"
                     value="{{ $category->id }}" id="{{ "category_$category->id" }}">
                  <label class="form-check-label" for="{{ "category_$category->id" }}">
                     {{ $category->name }}
                  </label>
               </div>
            @endforeach
            @error('category_id')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="source" class="form-label">Sumber Artikel/Video</label>
            <input type="text" class="form-control @error('source') is-invalid @enderror"
               placeholder="Masukkan pemilik artikel atau video" id="source" name="source" value="{{ old('source') }}"
               required>
            @error('source')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="link" class="form-label">Link Artikel/Video</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link"
               value="{{ old('link') }}" required>
            @error('link')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <div class="img-div col-md-8 mb-2" style="display: none">
               <img class="img-preview img-fluid rounded">
               <small class="d-flex justify-content-center text-muted mt-1">Thumbnail Preview</small>
            </div>
            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail"
               name="thumbnail" onchange="previewImage()" required>
            @error('thumbnail')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror"
               value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <a href="/dashboard/posts" role="button" class="btn btn-secondary me-1">Cancel</a>
         <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
   </div>

   <script src="/js/script.js"></script>
@endsection
