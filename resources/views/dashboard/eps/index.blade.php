@extends('dashboard.main')

@section('dashboard')
<main>
  <h1>{{ $latestIdUsingOrderBy}}</h1>

  <div title="New Series">
    <h1 class="text-slate-800 font-bold text-2xl">New<span class="text-primary text-2xl font-bold">Eps</span>
    </h1>
  </div>
  <div class="mt-3">
    <form action="/dashboard/episode/create" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="series_id" value="{{ $series->id }}">
      <input type="text" name="episode_id" id="episode" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-300 bg-clip-padding border border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-sky-400 focus:border-blue-600 focus:outline-none" >
      <div class="mb-5">
        <label for="title">Title</label> <br>
          <input type="text" name="title" id="title" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-300 bg-clip-padding border border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-sky-400 focus:border-blue-600 focus:outline-none" value="{{ old('title') }}" multiple>
          @error('title')
          {{ $message }}
      @enderror
      </div>
       <div class="mb-5">
        <label for="slug">Slug</label> <br>
          <input type="text" name="slug" id="slug" class="form-control block w-[80%] px-4 py-1 text-lg font-normal text-gray-700 bg-slate-300 bg-clip-padding border border-solid border-gray-300 transition ease-in-out m-0 focus:text-gray-700 focus:bg-cyan-400 focus:border-blue-600 focus:outline-none" value="{{ old('slug') }}">
          @error('slug')
          {{ $message }}
      @enderror
      </div>
      <label class="block mb-3" id="dup">
        <button id="button">
          <span class="material-icons-sharp">
          add_box
          </span>
        </button><br>
        {{-- <img src="" class="img-preview">
        <input type="file" class="block w-full text-sm text-slate-500
          file:mr-4 file:py-2 file:px-4
           file:border-2 file:mb-2
          file:text-sm file:font-semibold
          file:bg-violet-50 file:text-primary
          hover:file:bg-cyan-300
        " name="image[]" id="image" onchange="previewImage()">
        @error('image')
            {{ $message }}
        @enderror --}}
      </label>
       
      <div class="w-14 h-5 bg-gradient-to-r from-teal-500 to-purple-600 flex items-center justify-center p-3 mt-3">
        <button type="submit">
          <h1 class="text-lg font-semibold">Post</h1>
        </button>
      </div>
    </form>
  </div>
</main>
  <script>
    function previewImage(fileInput) {
  // Get the file selected by the user
  var file = fileInput.files[0];

  // List of allowed file types
  var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

  // Check if the file type selected by the user is allowed
  if (allowedTypes.indexOf(file.type) === -1) {
    // Display an error message if the file type is not allowed
    alert('Invalid file type. Only JPEG, PNG, and GIF files are allowed.');
    return;
  }

  // Get the img element associated with the input element
  var imgElement = document.querySelector('#' + fileInput.getAttribute('data-img'));

  // Set the src of the img element to the URL of the selected file
  imgElement.src = URL.createObjectURL(file);
}

const button = document.getElementById("button");

button.addEventListener("click", function(event) {
  event.preventDefault();

  // Create a new input element
  const input = document.createElement('input');
  input.type = 'file';
  input.name = 'image[]';
  input.id = 'image';
  input.onchange = function() {
    previewImage(this);
  }

  // Create a new img element
  const img = document.createElement('img');
  img.classList.add('img-preview');
  img.id = 'img' + (document.querySelectorAll('input[type="file"]').length + 1);

  // Set the data-img attribute of the input element to the ID of the img element
  input.setAttribute('data-img', img.id);

  // Append the input and img elements to the page
  document.getElementById("dup").appendChild(input);
  document.getElementById("dup").appendChild(img);
});
  </script>
@endsection