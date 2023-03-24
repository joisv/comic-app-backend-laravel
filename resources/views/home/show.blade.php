@extends('layouts.main')

@section('main')
<div class="section relative w-full">
    <div class="relative">
        <div class="swipe w-full bg-cover bg-top h-[50vh] sm:h-[65vh] absolute xl:bg-top lazy" data-background-image="{{ isset($series->image) ? asset('storage/'.$series->image) : asset('image/Sample.jpg') }}">
            {{-- Mobile --}}
            <div class="absolute top-2 right-2">
                <button class="fav-btn bg-transparent mb-favbtn">
                    <svg  width="31px" height="31px" viewBox="0 0 24 24" id="favourite" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                    <path id="primary" d="M20.28,4.74a5.82,5.82,0,0,0-8.28,0,5.82,5.82,0,0,0-8.28,0,5.94,5.94,0,0,0,0,8.34l7.57,7.62a1,1,0,0,0,1.42,0l7.57-7.62a5.91,5.91,0,0,0,0-8.34Z" />
                         </svg>

                </button>
            </div>
            <div  class="absolute bottom-0 sm:hidden mb-2">
                <h1 title="{{ $series->title }}" class="text-2xl font-semibold ml-2">{{ $series->title }}</h1>
                <div class="detailes flex items-center gap-1 w-fit px-1">
                    <h2 class="text-lg text-slate-200">{{ implode(', ', $series->genres->pluck('name')->toArray()) }}</h2>
                    <div class="flex h-full items-center mt-1 ">
                        <span class="material-icons text-base text-slate-200">
                            remove_red_eye
                        </span>
                        {{-- <h3 id="views" class="text-[12px] text-slate-200 ml-1">{{ $series->views }}</h3> --}}
                    </div>
                </div>
                {{-- <h2>{{ $series->status->name }}</h2> --}}
            </div>
        </div>
        <div class="absolute w-full h-full flex flex-wrap items-center justify-center max-sm:hidden">
            <div class="w-full glass flex flex-nowrap items-center  justify-center h-[65vh]">
                <div>
                    <h1 title="{{ $series->title }}" class="sm:text-4xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-slate-200 txt-shadow" id="fav-title">{{ $series->title }}</h1>
                    <h2 class="text-center mt-2 text-2xl font-medium">{{ $series->info->author ?? 'no author available' }}</h2>
                </div>
                <div class="w-4/5 h-20 absolute bottom-[23%] w-screen-lg flex items-end">
                    <div class="w-1/2 ml-5 flex gap-2 items-center">
                        <button class="fav-btn py-1 px-2 w-fit relative bg-slate-300 mb-2 flex items-center gap-1 rounde-sm" id="">
                            <span class="font-medium text-lg ">Favourite</span>
                            {{-- <svg fill="#5b21b6" width="31px" height="31px" viewBox="0 0 24 24" id="favourite" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                <path id="primary" d="M20.28,4.74a5.82,5.82,0,0,0-8.28,0,5.82,5.82,0,0,0-8.28,0,5.94,5.94,0,0,0,0,8.34l7.57,7.62a1,1,0,0,0,1.42,0l7.57-7.62a5.91,5.91,0,0,0,0-8.34Z" style="fill: #5b21b6;"/>
                            </svg> --}}
                        </button>
                        <div class="flex gap-1">
                            <div class="group">
                                <svg fill="#00000" width="31px" height="31px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" class="hover:fill-facebook group-hover:fill-facebook group-hover:-translate-y-2 duration-150 ease-in">
                                    <title>facebook</title>
                                    <path d="M30.996 16.091c-0.001-8.281-6.714-14.994-14.996-14.994s-14.996 6.714-14.996 14.996c0 7.455 5.44 13.639 12.566 14.8l0.086 0.012v-10.478h-3.808v-4.336h3.808v-3.302c-0.019-0.167-0.029-0.361-0.029-0.557 0-2.923 2.37-5.293 5.293-5.293 0.141 0 0.281 0.006 0.42 0.016l-0.018-0.001c1.199 0.017 2.359 0.123 3.491 0.312l-0.134-0.019v3.69h-1.892c-0.086-0.012-0.185-0.019-0.285-0.019-1.197 0-2.168 0.97-2.168 2.168 0 0.068 0.003 0.135 0.009 0.202l-0.001-0.009v2.812h4.159l-0.665 4.336h-3.494v10.478c7.213-1.174 12.653-7.359 12.654-14.814v-0z"></path>
                                    </svg>
                            </div>
                            <div class="group">
                                <svg fill="#00000" width="31px" height="31px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" class="hover:fill-twitter group-hover:fill-twitter group-hover:-translate-y-2 duration-150 ease-in">
                                    <title>twitter</title>
                                    <path d="M30.917 6.728c-1.026 0.465-2.217 0.805-3.464 0.961l-0.061 0.006c1.268-0.771 2.222-1.952 2.687-3.354l0.013-0.044c-1.124 0.667-2.431 1.179-3.82 1.464l-0.082 0.014c-1.123-1.199-2.717-1.946-4.485-1.946-3.391 0-6.14 2.749-6.14 6.14 0 0.496 0.059 0.979 0.17 1.441l-0.008-0.042c-5.113-0.254-9.613-2.68-12.629-6.366l-0.025-0.031c-0.522 0.873-0.831 1.926-0.831 3.052 0 0.013 0 0.026 0 0.039v-0.002c0 0.001 0 0.003 0 0.005 0 2.12 1.075 3.989 2.709 5.093l0.022 0.014c-1.026-0.034-1.979-0.315-2.811-0.785l0.031 0.016v0.075c0 0.001 0 0.002 0 0.002 0 2.961 2.095 5.434 4.884 6.014l0.040 0.007c-0.484 0.135-1.040 0.212-1.614 0.212-0.406 0-0.802-0.039-1.186-0.113l0.039 0.006c0.813 2.459 3.068 4.212 5.739 4.264l0.006 0c-2.072 1.638-4.721 2.627-7.602 2.627-0.005 0-0.009 0-0.014 0h0.001c-0.515-0.001-1.022-0.031-1.521-0.089l0.061 0.006c2.663 1.729 5.92 2.757 9.418 2.757 0.005 0 0.009 0 0.014 0h-0.001c0.037 0 0.082 0 0.126 0 9.578 0 17.343-7.765 17.343-17.343 0-0.039-0-0.077-0-0.116l0 0.006c0-0.262 0-0.524-0.019-0.786 1.21-0.878 2.229-1.931 3.042-3.136l0.028-0.044z"></path>
                                </svg>
                            </div>
                            <div class="group">
                                <svg fill="#00000" height="30px" width="30px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 32 32" xml:space="preserve" class="group-hover:fill-whatsapp group-hover:-translate-y-2 duration-150 ease-in">
                                    <path d="M17,0C8.7,0,2,6.7,2,15c0,3.4,1.1,6.6,3.2,9.2l-2.1,6.4c-0.1,0.4,0,0.8,0.3,1.1C3.5,31.9,3.8,32,4,32c0.1,0,0.3,0,0.4-0.1
                                    l6.9-3.1C13.1,29.6,15,30,17,30c8.3,0,15-6.7,15-15S25.3,0,17,0z M25.7,20.5c-0.4,1.2-1.9,2.2-3.2,2.4C22.2,23,21.9,23,21.5,23
                                    c-0.8,0-2-0.2-4.1-1.1c-2.4-1-4.8-3.1-6.7-5.8L10.7,16C10.1,15.1,9,13.4,9,11.6c0-2.2,1.1-3.3,1.5-3.8c0.5-0.5,1.2-0.8,2-0.8
                                    c0.2,0,0.3,0,0.5,0c0.7,0,1.2,0.2,1.7,1.2l0.4,0.8c0.3,0.8,0.7,1.7,0.8,1.8c0.3,0.6,0.3,1.1,0,1.6c-0.1,0.3-0.3,0.5-0.5,0.7
                                    c-0.1,0.2-0.2,0.3-0.3,0.3c-0.1,0.1-0.1,0.1-0.2,0.2c0.3,0.5,0.9,1.4,1.7,2.1c1.2,1.1,2.1,1.4,2.6,1.6l0,0c0.2-0.2,0.4-0.6,0.7-0.9
                                    l0.1-0.2c0.5-0.7,1.3-0.9,2.1-0.6c0.4,0.2,2.6,1.2,2.6,1.2l0.2,0.1c0.3,0.2,0.7,0.3,0.9,0.7C26.2,18.5,25.9,19.8,25.7,20.5z"/>
                                </svg>
                            </div>
                            <div>
                                <svg width="30" height="30" viewBox="0 0 36 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.5263 0H3.78947C1.70526 0 0 1.71818 0 3.81818V30.5455H3.78947V3.81818H26.5263V0ZM24.6316 7.63636L36 19.0909V38.1818C36 40.2818 34.2947 42 32.2105 42H11.3495C9.26526 42 7.57895 40.2818 7.57895 38.1818L7.5979 11.4545C7.5979 9.35455 9.28421 7.63636 11.3684 7.63636H24.6316ZM22.7368 21H33.1579L22.7368 10.5V21Z" fill="black"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        
    </div>
    <div class="w-full relative h-auto grid justify-items-center">
        <div class="infos w-full max-w-screen-lg sm:w-[80%] h-[100vh] sm:h-fit bg-[#161516] p-2 ease-out absolute duration-300 top-[50vh] mx-auto">
            {{-- Mobile --}}
            <div class="sm:hidden relative">
                <button class="absolute right-0 top-0 self-center" id="tutp">
                    <span class="material-icons text-red-500">
                        disabled_by_default
                    </span>
                </button>
                <div class="relative top-12">
                    <div class="button-eps mb-3">
                        <div class="flex relative ">
                            <button class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 w-3/5 self-center h-10 drop-shadow-xl max-w-sm">
                                <h1 class="font-semibold text-slate-200 text-lg">Start Watch</h1>
                            </button>
                           
                        </div>
                    </div>
                    <div class="content grid grid-cols-3 gap-2">
                        @if ($episodes->count())
                            @foreach ($episodes->reverse() as $episode)
                            <a href="/episode/{{ $episode->slug }}">
                                @if ($episode->embeds->count())
                                    <img data-src="{{ $episode->embeds->first()->embed }}" class="bg-eps w-full h-28 object-center object-cover lazy">
                                @else
                                    <p class="text-slate-500">Image not found</p>
                                @endif
                                <h3 class="text-sm font-semibold text-slate-200">{{ $episode->title }}</h3>
                            </a>
                            @endforeach
                        @else
                            <h2 class="text-slate-200">No Episode Available</h2>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="responsive w-full flex p-5 max-sm:hidden">
                <div class="h-auto p-2 w-[70%]">
                    <div class="flex items-center gap-2">
                        <span class="material-icons sm:text-3xl text-4xl text-secondary">
                            remove_red_eye
                        </span>
                        <span class="text-2xl sm:text-lg text-slate-100">200,000</span>
                        <div class="ml-2 flex items-center gap-2">
                            <div class="px-2 bg-primary text-slate-100">
                                <h2>Rating</h2>
                            </div>
                            <div class="text-slate-200">
                                <p>{{ $series->info->rating ?? 'N/A'}}</p>
                            </div>
                        </div>
                        {{-- <span class="ml-3 text-2xl sm:text-base font-semibold text-primary">{{ $series->views }}</span> --}}
                    </div>
                    <div class="text-2xl sm:text-lg flex gap-2">
                        @foreach ($series->genres as $genre)
                        <h3 class=" font-medium text-slate-200">{{ $genre->name }}</h3> 
                        @endforeach
                    </div>
                    <div class="flex mb-3">
                        <h3 class="text-primary">{{ $series->info->type ?? 'N/A' }}</h3>
                        <span class="ml-2 text-slate-200">{{ $series->info->status ?? 'N/A' }}</span>
                    </div>
                    <div class="sm:h-52 overflow-y-scroll p-1">
                        <div class="text-[#DADADA] font-light text-sm sm:text-base">
                            <p>{!! $series->body ?? 'No description available' !!}</p>
                        </div>
                    </div>
                    <div class="mt-4 ">
                        <button class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 w-3/5 self-center h-10 drop-shadow-xl max-w-sm">
                            <h1 class="font-semibold text-slate-200 text-lg sm:text-sm lg:text-xl xl:text-2xl">Start Watch</h1>
                        </button>
                    </div>
                </div>
                <div class="w-full">
                   
                    <div class="max-h-full overflow-y-scroll">
                        <ul>
                            @if ($episodes->count())
                                @foreach ($episodes->reverse() as $episode)
                                <li>
                                    <a href="/episode/{{ $episode->slug }}">
                                        <div class="flex w-full items-center justify-between p-1">
                                            <div>
                                                <h1 class="text-slate-200 text-xl">{{ $episode->title }}</h1>
                                                <p class="text-slate-400 text-sm mt-2">{{ $episode->created_at->format('Y-m-d') }}</p>
                                            </div>
                                            <div>
                                                @if ($episode->embeds->count())
                                                    <img data-src="{{ $episode->embeds->first()->embed }}"  class="lazy object-cover object-center w-20 h-20 bg-sky-500">
                                                @else
                                                    <p class="text-slate-500">Image not found</p>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @else
                                    <h2 class="text-slate-200">No Episode Available</h2>
                                @endif
                        </ul>
                    </div>
                    {{-- <div class="content grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-4 gap-2 max-h-full overflow-y-scroll">
                        <a href="/episode/{{ $episode->slug }}" class="z-20">
                            <div style="background-image: url('/image/There.jpg')" class="bg-image w-full h-28 sm:h-20 bg-center bg-cover">
                            </div>
                            <div class="w-full h-full p-2">
                                <h3 class="text-sm sm:text-xs text-slate-200 bottom-1 lg:text-base">{{ $episode->title }}</h3>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const tutp = document.getElementById('tutp')
    const scroller = document.querySelector('.infos')

    if (window.matchMedia("(max-width: 640px)").matches) {
        window.addEventListener('scroll', function(){
            var ww = window.scrollY
            if(ww > 57){
            scroller.classList.add('-translate-y-[50vh]')
            }
        })
    } 
    const link = document.URL
    const imgImage = document.querySelector('.swipe').getAttribute('data-background-image');
    const h1Title = document.getElementById('fav-title');
    const button = document.querySelectorAll('.fav-btn');
    const mbfavBtn = document.querySelector('.mb-favbtn')
    button.forEach(button => {
        button.addEventListener("click", function() {
        let data = JSON.parse(localStorage.getItem("data")) || [];
        let newData = {
            title: h1Title.innerHTML,
            image: imgImage,
            links: link
        };
        let isDataExist = false;
        for(let i=0; i< data.length; i++){
            if(data[i].title == h1Title.innerHTML){
                isDataExist = true;
                data.splice(i,1);
                break;
            }
        }
        if(!isDataExist){
            data.push(newData);
        }
        localStorage.setItem("data", JSON.stringify(data));
        if (isDataExist) {
            button.classList.remove('bg-primary');
            button.classList.remove('text-slate-200');
            mbfavBtn.children[0].classList.remove('fill-primary')
            button.classList.add('bg-slate-300')
        } else {
            button.classList.remove('bg-slate-300');
            button.classList.add('bg-primary');
            button.classList.add('text-slate-200');
            mbfavBtn.children[0].classList.add('fill-primary')
        }
    });
        
    });
let data = JSON.parse(localStorage.getItem("data"));
if (data) {
        data.forEach(element => {
            if(element.title ==  h1Title.innerHTML){
                button.forEach(button => {
                    button.classList.remove('bg-slate-300')
                    button.classList.add('bg-primary')
                    button.classList.add('text-slate-200')

                })
                mbfavBtn.children[0].classList.add('fill-primary')
            } else {
                button.forEach(button => {

                    button.classList.remove('bg-primary');
                    button.classList.remove('text-slate-200');
                    button.classList.add('bg-slate-300')
                })
                mbfavBtn.children[0].classList.remove('fill-primary')
            }
        });
    }
    
    
    
// Views
// var element = document.querySelector("#views");
// var value = parseInt(element.textContent);
// value--;
// element.textContent = value;

tutp.addEventListener('click', function(){
    scroller.classList.remove('-translate-y-[50vh]')
})   
</script>
@endsection