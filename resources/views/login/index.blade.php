@extends('layouts.main')

@section('main')
<section class="h-screen relative font-mono bg-dashboard">
  @if (session()->has('failed'))
  <div class="m-auto flex justify-center">
    <div class="w-60 h-12 bg-red-400 absolute m-auto top-5 flex items-center justify-center" id="failed">
      <h1 class="text-lg font-semibold text-slate-100">{{ session('failed') }}</h1>
    </div>
  </div>
  <script>
    const failed = document.getElementById('failed')
    setTimeout(() => {
      failed.remove()
    }, 5000);
  </script>
  @endif
    <div class="px-6 h-full text-gray-800">
      <div class="flex justify-center items-center flex-wrap h-full">
          <form action="/login" method="POST">
            @csrf
            <div class="box-shadow-login h-80 p-2 bg-dashform grid items-center border-2 border-primary lg:w-[250px]">
              <div class="w-full h-auto grid justify-items-center">
                    <!-- Email input -->
                <div class="mb-6 w-[90%]">
                  <input type="email" class="form-control block w-full px-1 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-400 transition ease-in-out m-0 focus:bg-white focus:border-blue-600 focus:outline-none h-10 placeholder:text-slate-600" id="email" placeholder="Email address" name="email" autofocus/>
                </div>
      
                <!-- Password input -->
                <div class="mb-6 w-[90%]">
                  <input type="password" class="form-control block w-full px-1 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-400 transition ease-in-out m-0 focus:bg-white focus:border-blue-600 focus:outline-none h-10 placeholder:text-slate-600" id="password" placeholder="password" name="password"/>
                </div>
                
                <div class="relative w-[40%] h-12 flex items-center justify-center gap-1 after:w-full after:h-12 after:absolute border-2 border-primary after:hover:bg-primary after:hover:dash-mnnu hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200 group">
                  <button type="submit" class="z-20">
                    <span class="font-medium text-base group-hover:text-white">
                      Login
                    </span>
                  </button>
              </div>
              </div>
         
            </div>
          </form>
      </div>
    </div>
  </section>
  <script>
    const nav = document.getElementById('navbar')
    const nav2 = document.getElementById('nav2')
     nav.style.display = 'none'
     nav2.style.display = 'none'
  </script>
@endsection