@extends('layouts.main')

@section('main')

<header class="relative">
    <nav class="fixed z-20 duration-300" id="navRead">
        <div class="title-chapter w-screen flex justify-center static p-2 mb-2 bg-trasnparent" >
            <div class="flex items-center absolute left-2">
            <button onclick="backMe()">
                <svg width="27" height="27" viewBox="0 0 27 27" class="lg:fill-slate-200 lg:w-12 lg:h-12">
                    <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z"/>
                    </svg>
            </button>
        </div>
            <h1 class="text-2xl font-semibold" title="Death Note">{{ $episode->title }}</h1>
    
        </div>
    </nav>
    
</header>
<div class="w-full h-screen z-10 absolute flex justify-center">
    {{-- popup --}}
    <div class="popp popup-shadow w-[88%] max-w-screen-md h-44 bg-red-500 fixed top-[35%] border-2 border-black grid justify-items-center p-1" id="popup">
        <h3 class="text-center text-slate-300 font-semibold text-lg mt-7">Bantu website ini untuk tetap update manga favourite kalian</h3>
        <div class="btn-popup w-full h-20 flex items-center justify-center gap-1">
            <button class="w-11 h-auto p-[3px] bg-slate-400 flex justify-center" onclick="backMe()">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="none">
                    <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z" fill="black"/>
                    </svg>
            </button>
            <button class="w-fit h-auto p-1 bg-gradient-to-tr from-[#00B1BC] to-[#D40073]" onclick="popupAds()">
                <span class="text-slate-200 text-center font-semibold text-base">Lanjutkan membaca</span>
            </button>
        </div>
    </div>
    {{-- end popup --}}
    <div class="box-shadow-nav bottom-5 fixed w-9/12 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 h-11 flex items-center duration-200 drop-shadow-xl max-w-screen-sm" id="navButt">
            <button class="relative flex items-center justify-center bg-slate-600 -right-5" id="loveme">
                <span class="material-icons absolute">
                    favorite_border
                </span>
                <span class="material-icons text-xs absolute text-green-500">
                    attach_money
                </span>
            </button>
        <button class="absolute right-2 flex items-center">
            <a href="/episode/{{ $episode->slug }}">
                <span class="material-icons text-2xl font-semibold">
                    navigate_next
                    </span>
            </a>
        </button>
        <button class="back absolute right-8 flex items-center mrr" onclick="backMe()">
            <span class="material-icons text-2xl font-semibold">
                navigate_next
                </span>
        </button>
    </div>
</div>
<main class="grid justify-items-center">
    <div class="absolute max-w-screen-md">
        <div class="readme">
            @if ($embeds->count())
            @foreach ($embeds as $embed)
              <img class="lazy" data-src="{{ asset($embed->embed) }}">
            @endforeach
          @elseif ($readareas->count())
            @foreach ($readareas as $readarea)
              <img src="{{ asset('storage/'.$readarea->image)}}" alt="">
            @endforeach
          @else
            <h1>Tidak ada apapun disini</h1>
          @endif
        </div>
    </div>
</main>
<script>
     const nav = document.querySelectorAll('.navbar')
     nav.forEach(element => {
        element.style.display = 'none'
     });

const navButt = document.querySelector('#navButt');
const navRead = document.querySelector('#navRead');
let lastScrollTop = 0;
window.addEventListener('scroll', (event) => {
  const currentScroll = window.pageYOffset;

  if (currentScroll > lastScrollTop) {
    // Scroll down
    navRead.classList.toggle('-translate-y-20', true);
    navRead.classList.toggle('ease-in-out', true);
    navButt.classList.toggle('translate-y-20', true);
    navButt.classList.toggle('ease-in-out', true);
    
} else {
    // Scroll up
    navRead.classList.toggle('-translate-y-20', false);
    navRead.classList.toggle('ease-in-out', false);
    navButt.classList.toggle('translate-y-20', false);
    navButt.classList.toggle('ease-in-out', false);
  }

  lastScrollTop = currentScroll;
});
function popupAds(){
    window.open("https://youtube.com")
    document.querySelector('.popp').classList.add('hidden')
}

function backMe(){
    window.history.back()
}
</script>
@endsection
