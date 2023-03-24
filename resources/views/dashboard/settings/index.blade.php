@extends('dashboard.main')

@section('dashboard')
<main>
    <div title="New Series" class=" max-w-screen-md flex items-center realative p-1 m-auto">
      <button class="relative md:absolute -top-5" onclick="backMe()">
        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z" fill="black"/>
          </svg>
      </button>
      <h1 class="text-slate-800 font-bold text-2xl">Edit<span class="text-primary text-2xl font-bold">Profile</span>
      </h1>

    </div>
    <div class="relative max-w-screen-md grid m-auto">
        <div class="absolute w-full">
          <div class="absolute bg-dashform w-full h-screen">
           
            <div class="relative max-w-screen-md grid m-auto">
              <div class="absolute w-full"></div>
              <div class="mt-3 absolute bg-dashform w-full md:h-screen p-5">
            <form action="/dashboard/settings/{{ $user->name }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="oldImage" value="{{ $user->image }}">
                  <div class="mb-3 form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500">
                      <input type="file" name="image" id="image" class=" rounded-[2px] block px-2 py-1 xl:w-1/2 font-normal bg-dashform  bg-clip-padding transition ease-in-out m-0 mb-2 right-2" value="{{ old('image', $user->image) }}" placeholder="Name Here..."> 
                  </div>
                  <div class="mb-3 w-full top-5 right-2 lg:w-[70%] lg:right-28">
                    <input type="text" name="name" id="name" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('name', $user->name) }}" placeholder="Name Here...">
                    @error('name')
                    {{ $message }}
                    @enderror
                  </div>
                  <div class="mb-3 w-full top-5 right-2 lg:w-[70%] lg:right-28">
                      <input type="email" name="email" id="email" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('email', $user->email) }}" placeholder="Email Here...">
                      @error('email')
                      {{ $message }}
                  @enderror
                  </div>
                  <div class="mb-3 w-full top-5 right-2 lg:w-[40%] lg:right-28">
                      <input type="text" name="oldPassword" id="oldPassword" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('oldPassword') }}" placeholder="Old Pasword...">
                      @error('oldPassword')
                        {{ $message }}
                      @enderror
                  </div>
                  <div class="mb-3 w-full top-5 right-2 lg:w-[40%] lg:right-28">
                      <input type="password" name="password" id="password" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('password') }}" placeholder="New Pasword...">
                      @error('password')
                        {{ $message }}
                      @enderror
                  </div>
                  <div class=" w-full top-5 right-2 lg:w-[40%] lg:right-28">
                      <input type="password"  name="password_confirmation" id="password_confirmation" class="form-control block w-full px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" placeholder="Confirm Password...">
                  </div>
                  <div class="sm:absolute w-fit h-8 bg-primary opacity-85 items-center justify-center p-3 mt-3 flex rounded-[2px] sm:-top-14 sm:right-0">
                      <button type="submit" class="flex items-center gap-1 ">
                      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-slate-200"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4.01 6.03l7.51 3.22-7.52-1 .01-2.22m7.5 8.72L4 17.97v-2.22l7.51-1M2.01 3L2 10l15 2-15 2 .01 7L23 12 2.01 3z"/></svg>
                      <h1 class="text-lg font-semibold text-slate-200">Save</h1>
                      </button>
                  </div>
            </form>
      </div>
      </div>
      </div>
      </div>
  </div>
    </div>
  </main>
  <script>
     function backMe(){
    window.history.back()
    }
  </script>
@endsection