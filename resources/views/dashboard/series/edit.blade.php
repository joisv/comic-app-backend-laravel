@extends('dashboard.main')

@section('dashboard')
<main>
  <div title="New Series" class=" max-w-screen-md flex items-center realative p-1 m-auto">
    <button class="relative md:absolute -top-5" onclick="backMe()">
      <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z" fill="black"/>
        </svg>
    </button>
    <h1 class="text-slate-800 font-bold text-2xl">Edit<span class="text-primary text-2xl font-bold">Series</span>
    </h1>
   
  </div>
    <div class="relative max-w-screen-md grid m-auto">
      <div class="absolute w-full"></div>
      <div class="mt-3 absolute bg-dashform w-full md:h-screen p-5 overflow-hidden sm:overflow-visible">
      <form action="/dashboard/series/{{ $series->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- <input type="text" value="{{ $series->info->series_id }}" name="series_id"> --}}
        <div class="mb-5">
          <label for="title">Title</label> <br>
            <input type="text" name="title" id="title" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-b-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('title', $series->title) }}">
            @error('title')
            {{ $message }}
        @enderror
        </div>
        <div class="mb-5">
          <label for="slug">Slug</label> <br>
            <input type="text" name="slug" id="slug" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-b-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('slug', $series->slug) }}">
            @error('slug')
            {{ $message }}
        @enderror
        </div>
         <div class="mb-5 flex gap-2">
          
          <select name="type" id="type">
            @foreach (['Doujinshi', 'Manhwa', 'Manga', 'Comic'] as $option)
                @if(!empty($series->info->type) && $series->info->type == $option)
                    <option value="{{ $option }}" selected>{{ $option }}</option>
                @else
                    <option value="{{ $option }}">{{ $option }}</option>
                @endif
            @endforeach
          </select>

          <select name="status" id="status">
            @foreach (['Ongoing', 'Pending', 'Complete',] as $option)
                @if(!empty($series->info->status) && $series->info->status == $option)
                    <option value="{{ $option }}" selected>{{ $option }}</option>
                @else
                    <option value="{{ $option }}">{{ $option }}</option>
                @endif
            @endforeach
          </select>
             <button class="genres-btn bg-primary hover:bg-violet-600 focus:outline-none p-1 rounded-sm text-slate-200 lg:hidden">Genre</button>
        </div>
        <div>
          @if (!empty($series->info->author))
            <input class="form-control block w-1/2 px-2 py-1 text-sm font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100 focus:outline-none placeholder:text-slate-500 mb-2" type="text" placeholder="author..." name="author" value="{{ old('author', $series->info->author) }}">
          @else
            <input class="form-control block w-1/2 px-2 py-1 text-sm font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100 focus:outline-none placeholder:text-slate-500 mb-2" type="text" placeholder="author..." name="author" value="{{ old('author') }}">
          @endif

          @if (!empty($series->info->author))
            <input class="form-control block w-1/2 px-2 py-1 text-sm font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100 focus:outline-none placeholder:text-slate-500 mb-2" type="text" placeholder="author..." name="rating" value="{{ old('rating', $series->info->rating) }}">
          @else
            <input class="form-control block w-1/2 px-2 py-1 text-sm font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-200 focus:outline-none placeholder:text-slate-500 mb-2" type="text" placeholder="rating..." name="rating" value="{{ old('rating') }}">
          @endif
          
        </div>
        <div class="genres-form absolute w-3/4 sm:w-1/3 bg-dashform -top-0 -right-3 lg:-right-[35%] p-1 z-10 hidden lg:block border-2 border-primary">
          <button class="genres-btn px-2 bg-red-500 font-semibold absolute -left-6 lg:hidden">x</button>
          <div>
            <input class="w-full border-2 border-b-slate-400 focus:outline-none px-2 py-1 text-base" type="text" id="genres" autofocus>
            <div class="mt-5 flex flex-wrap gap-3 p-1 max-h-40 overflow-y-scroll">
              @foreach ($genres as $genre)
              <div class="gens relative mb-2">
                <input class="absolute hidden left-0" type="checkbox" name="name[]" id="genre" value="{{ $genre->id }}" @if ($series->genres->contains($genre->id)) checked @endif>
                <label class="font-medium p-2 rounded-sm" for="genre">{{ $genre->name }}</label>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
        <label class="block mb-3">
          <input type="hidden" name="oldImage" value="{{ $series->image }}">
          @if ($series->image)
              <img src="{{ asset('storage/'.$series->image) }}" class="img-preview w-1/4">
          @else
          <img src="" class="img-preview w-1/4">
          @endif
          <input type="file" class="block w-full text-sm text-slate-500
            file:mr-4 file:py-2 file:px-4
             file:border-0
            file:text-sm file:font-semibold
            file:bg-violet-50 file:text-primary
            hover:file:bg-cyan-300
          " name="image" id="image" onchange="previewImage()">
          @error('image')
              {{ $message }}
          @enderror
        </label>
          <div>
            <input id="body" type="hidden" name="body" value="{{ old('body', $series->body) }}">
          <trix-editor input="body"></trix-editor>
        </div>
        <div class="sm:absolute w-fit h-8 bg-primary opacity-85 items-center justify-center p-3 mt-3 flex rounded-[2px] sm:-top-14 sm:right-0">
          <button type="submit" class="flex items-center gap-1 ">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-slate-200"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4.01 6.03l7.51 3.22-7.52-1 .01-2.22m7.5 8.72L4 17.97v-2.22l7.51-1M2.01 3L2 10l15 2-15 2 .01 7L23 12 2.01 3z"/></svg>
            <h1 class="text-lg font-semibold text-slate-200">Post</h1>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
  </main>

  <script>
    function previewImage(){
         const image = document.querySelector('#image');
         const imgPreview = document.querySelector('.img-preview')
 
         imgPreview.style.display = 'block';
 
         const oFReader = new FileReader()
 
         oFReader.readAsDataURL(image.files[0]);
 
         oFReader.onload = function(oFREvent){
             imgPreview.src = oFREvent.target.result;
         }
     }
     function backMe(){
      window.history.back()
    }
 </script>
 <script src="{{ asset('js/genres.js') }}"></script>
@endsection