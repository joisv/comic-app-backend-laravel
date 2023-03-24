<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>
<body class="font-mono bg-dashboard">
  <div class="conn">
    <header>
      @include('dashboard.navbar.navbar')
    </header>
    {{-- content --}}
    <div class="container relative mx-auto p-2 top-10" id="tbb">
      @if (session()->has('succes'))
      <div class="dash-menu absolute w-fit h-fit bg-gradient-to-r from-green-400 to-teal-500 -top-7 p-2 px-10 z-50 flex items-center justify-center right-2" id="rmv">
        <h1 class="font-medium text-lg">{{ session('succes') }}</h1>
      </div>
      <script>
          const del = document.getElementById('rmv')
          setTimeout(() => {
            del.remove()
          }, 5000);
      </script>
      @endif
      @if (session()->has('deleted'))
      <div class="dash-menu absolute w-[25%] h-fit bg-gradient-to-r from-green-400 to-teal-500 -top-7 p-2  z-50 flex items-center justify-center right-2" id="rmv">
        <h1>{{ session('deleted') }}</h1>
      </div>
    <script>
        const del = document.getElementById('rmv')
        setTimeout(() => {
          del.remove()
        }, 5000);
    </script>
    @endif
      @yield('dashboard')
      
    </div>
  </div>
 
  <script src="{{ asset('js/index.js') }}"></script>
<script>
  function menuBtn(){
    const top = document.getElementById('top')
    const nav = document.getElementById('nav')
    const tbb = document.getElementById('tbb')
    top.classList.toggle('blur-sm')
    tbb.classList.toggle('blur-sm')
    nav.classList.toggle('-left-full')
   
  }
</script>
</body>
</html>