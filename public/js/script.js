// generate slug
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('input', function(){
   fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
});

// disable upload file feature
document.addEventListener("trix-file-accept", function(event) {
   event.preventDefault();
});

// preview image
function previewImage() {
   const imagePrevBlock = document.querySelector('.img-div');
   const image = document.querySelector('#image');
   const imgPreview = document.querySelector('.img-preview');

   // imgPreview.style.display = 'block';

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);

   oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
   }

   imagePrevBlock.removeAttribute('style');
}