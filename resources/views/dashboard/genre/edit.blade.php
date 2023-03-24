@extends('dashboard.main')

@section('dashboard')
<main>
    <div title="New Series" class=" max-w-screen-md flex items-center realative p-1 m-auto">
      <button class="relative md:absolute -top-5" onclick="backMe()">
        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z" fill="black"/>
          </svg>
      </button>
      <h1 class="text-slate-800 font-bold text-2xl">Edit<span class="text-primary text-2xl font-bold">Episode</span>
      </h1>
    </div>
    <div class="relative max-w-screen-md grid m-auto">
      <div class="absolute w-full"></div>
      <div class="mt-3 absolute bg-dashform w-full md:h-screen p-5">
      <form action="/dashboard/genre/{{ $genres->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-5">
          <label for="title">Title</label> <br>
            <input type="text" name="name" id="title" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-b-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('title', $genres->name) }}" placeholder="title...">
            @error('title')
            {{ $message }}
        @enderror
        </div>
         <div class="mb-5">
          <label for="slug">Slug</label> <br>
            <input type="text" name="slug" id="slug" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-slate-200 bg-clip-padding border-2 border-b-slate-400 transition ease-in-out m-0 focus:text-gray-700 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('slug', $genres->slug) }}" placeholder="slug...">
            @error('slug')
            {{ $message }}
        @enderror
        </div>
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
  @endsection