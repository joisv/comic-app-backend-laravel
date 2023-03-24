@extends('dashboard.main')

@section('dashboard')
<main>
    <div title="New Series" class=" max-w-screen-md flex items-center realative p-1 m-auto">
      <button class="relative md:absolute -top-5">
        <a href="/dashboard/episode">
          <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z" fill="black"/>
          </svg>
        </a>
      </button>
      <h1 class="text-slate-800 font-bold text-2xl">Edit<span class="text-primary text-2xl font-bold">Episode</span></h1>
    </div>
    <div class="relative max-w-screen-md grid m-auto">
      <div class="absolute w-full">
        <div class="mt-3 absolute bg-dashform w-full md:h-fit p-5">
      <form action="/dashboard/episode/{{ $episode->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- <input type="text" name="episode_id" value="{{ $episode->embed->episode_id }}"> --}}
        <div class="mb-5">
          <label for="title">Title</label><br>
            <input type="text" name="title" id="title" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-b-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('title', $episode->title) }}" placeholder="title...">
            @error('title')
            {{ $message }}
            @enderror
        </div>
         <div class="mb-5">
          <label for="slug">Slug</label> <br>
            <input type="text" name="slug" id="slug" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-b-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('slug', $episode->slug) }}" placeholder="slug...">
            @error('slug')
            {{ $message }}
            @enderror
         </div>
         <div class="mb-5 flex">
          <select name="series_id" id="series">
            @foreach ($serieses as $series)
              @if (old('series_id', $episode->series->id) == $series->id)
                <option value="{{ $series->id }}" selected>{{ $series->title }}</option>    
              @else
                <option value="{{ $series->id }}">{{ $series->title }}</option>
              @endif
            @endforeach
          </select>
         </div>
        
         <div class="block mb-3">
          @foreach ($episode->embeds as $embed)
            <input type="text" class="block mb-5 border-2 border-primary w-[40%] px-1 py-1" name="embed[]" value="{{ old('embed', $embed->embed) }}">
            <input type="hidden" value="{{ $embed->episode_id }}" name="episode_id">
          @endforeach
         </div>
          <div class="mb-3">
            <label class="" id="embed"></label><br>
          </div>
           <label class="block mb-3" id="dup">
             @foreach ($episode->readmes as $item)
           {{--  --}}
            @if ($item->image)
              <img src="{{ asset('storage/'.$item->image) }}" class="img-preview w-1/4 block">
              <div>
                <input type="file" name="image[]" value="{{ asset('storage/' . $item->image) }}">
              </div>
            @else
              <img src="" class="img-preview w-1/4">
            @endif
            @endforeach
            </label>
            <button id="button-embed">
              <span class="material-icons-sharp">
                add_link
                </span><h2>Embed Image</h2>
            </button>
            <button id="button">
              <span class="material-icons-sharp">
              add_box
              </span><h2>Upload Image</h2>
            </button><br>
              <div class="sm:absolute w-fit h-8 bg-primary opacity-85 items-center justify-center p-3 mt-3 flex rounded-[2px] sm:-top-14 sm:right-0">
                <button type="submit" class="flex items-center gap-1 ">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-slate-200"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4.01 6.03l7.51 3.22-7.52-1 .01-2.22m7.5 8.72L4 17.97v-2.22l7.51-1M2.01 3L2 10l15 2-15 2 .01 7L23 12 2.01 3z"/></svg>
                  <h1 class="text-lg font-semibold text-slate-200">Update</h1>
                </button>
              </div>
        </form>
    </div>
    </div>
    </div>
  </main>
  <script>
        document.getElementById('button-embed').addEventListener('click', function(event) {
      event.preventDefault()
      var input = document.createElement('input');
      input.type = 'text';
      input.name = 'embed[]';
      input.value = '{{ old('embed') }}';
      input.placeholder = 'Links Here';
      input.classList = 'block mb-5 border-2 border-primary w-[40%] px-1 py-1';
      document.getElementById('embed').appendChild(input);
    });
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
function backMe(){
    window.history.back()
}
 </script>
@endsection