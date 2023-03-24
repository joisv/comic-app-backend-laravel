@extends('dashboard.main')

@section('dashboard')
<main>
  <div title="New Series" class=" max-w-screen-md flex items-center realative p-1 m-auto">
    <button class="relative md:absolute -top-5" onclick="backMe()">
      <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z" fill="black"/>
        </svg>
    </button>
    <h1 class="text-slate-800 font-bold text-2xl">New<span class="text-primary text-2xl font-bold">User</span>
    </h1>    
  </div>
  <div class="relative max-w-screen-md grid m-auto">
    <div class="absolute w-full">
      <div class="mt-3 absolute bg-dashform w-full md:h-screen p-5">
        <form action="/dashboard/user" method="POST">
            @csrf
        <div class="mb-5">
            <label for="name" class="text-lg font-semibold">Username</label> <br>
              <input type="text" name="name" id="name" class="form-control block w-3/4 px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('name') }}" placeholder="Username...">
          </div>
        <div class="mb-5">
            <label for="email" class="text-lg font-semibold">Email</label> <br>
              <input type="email" name="email" id="email" class="form-control block w-3/4 px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('email') }}" placeholder="Email...">
          </div>
        <div class="mb-5">
            <label for="password" class="text-lg font-semibold">Password</label> <br>
              <input type="password" name="password" id="password" class="form-control block w-3/4 px-4 py-1 text-lg font-normal text-gray-700 bg-clip-padding border-2 border-primary transition ease-in-out m-0 focus:bg-slate-100  focus:outline-none placeholder:text-slate-500" value="{{ old('password') }}" placeholder="Password">
          </div>
          <div class="sm:absolute w-fit h-8 bg-primary opacity-85 items-center justify-center p-3 mt-3 flex rounded-[2px] sm:-top-14 sm:right-0">
            <button type="submit" class="flex items-center gap-1 ">
              <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-slate-200 group-hover:fill-dashform z-10"><path d="M0 0h24v24H0z" fill="none"/><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
              <h1 class="text-lg font-semibold text-slate-200">Add User</h1>
            </button>
          </div>
        </form>
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