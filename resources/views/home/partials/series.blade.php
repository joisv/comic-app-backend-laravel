@if ($series->count())
<section>
    <div title="New Episode" class="max-w-screen-lg m-auto py-5">
        <h1 class="sm:text-4xl text-2xl text-slate-200 font-bold opacity-50 ml-2 sm:m-0">New Series</h1>
     </div>
    <div class="w-full relative">
    <div class="max-w-screen-lg grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-1 mx-auto">
        <article class="bg-eps w-full h-full bg-cover bg-top sm:bg-top row-span-2 relative lazy" data-background-image="{{ isset($series[0]->image) ? asset('storage/'.$series[0]->image) : asset('image/Sample.jpg')}}">
            <a href="/manga/{{ $series[0]->slug }}">
            <div class="w-full h-full absolute">
                  <div class="bg-primary flex items-center justify-center absolute w-full p-2">
                        <h1 class="text-slate-200 font-semibold">NEW</h1>
                  </div>
                  <div class="w-full h-full relative">
                     <div  class="absolute bottom-2">
                        <div title="{{ $series[0]->title }}" class="p-1">
                           <h1 class="text-center font-medium text-lg text-slate-200">{{ $series[0]->title }}</h1>
                        </div>
                        <div class="bgTypes w-fit h-fit p-1 ">
                           <h1 class="types text-xs font-semibold text-slate-200">{{ $series[0]->info->type ?? 'N/A' }}</h1>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
          </article>
        @foreach ($series->skip(1) as $post)
        <a href="/manga/{{ $post->slug }}" class="group block">
            <article class="bg-eps w-full h-52 md:h-64 lg:h-72 xl:h-80 relative bg-cover bg-top after:group-hover:bg-sky-400 after:w-full after:h-full after:absolute after:duration-75 after:group-hover:ease-in overflow-hidden sm:bg-top lazy" data-background-image="{{ isset($post->image) ? asset('storage/'.$post->image) : asset('image/Sample.jpg') }}">
                <div class="w-full h-full p-1 relative">
                    <div class="absolute bottom-0">
                        <div class="w-full">
                            <h1 title="Naruto Shippuden" class="text-sm font-semibold z-20 group-hover:text-slate-200 sm:text-lg text-slate-200">{{ $post->title }}</h1>
                        </div>
                        <div class="flex items-center">
                            <div class="bgTypes">
                                @if (!empty($series->genre))
                                @foreach ($series->genre->slice(1) as $item)
                                    <h1 class="types text-xs font-semibold text-slate-200" id="">{{ $item->name }}</h1> 
                                @endforeach
                                @else
                                    <p class="font-medium text-xs">N/A</p>
                                @endif
                                {{-- <span class="types sm:text-base text-xs z-10 font-medium text-rose-500">{{ implode(', ', $post->genres->pluck('name')->toArray()) }}</span> --}}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </article>
        </a>
        @endforeach
    </div>
    </div>
</section>
    
@else
    <div class="w-full flex justify-center">
        <h1 class="text-slate-100 font-bold text-4xl bg-primary w-fit p-5 rounded-sm">No Series Available</h1>
    </div>
@endif
<script src="{{ asset('js/type.js') }}"></script>