<section>
   <div title="New Episode" class="max-w-screen-lg m-auto py-5">
      <h1 class="sm:text-4xl text-2xl text-slate-200 font-bold opacity-50 ml-2 sm:m-0">New Episode</h1>
   </div>
   <div class="wraper relative w-full">
       <div class="w-full grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 items-center justify-items-center gap-1 max-w-screen-lg m-auto" id="loop">
         @foreach ($episodes as $episode)
         <article class="bg-eps block w-full h-52 md:h-64 lg:h-72 xl:h-80 relative bg-top bg-cover lazy" data-background-image="{{ isset($episode->series->image) ? asset('storage/'.$episode->series->image) : asset('image/Sample.jpg')}}"> 
            <a href="/manga/{{ $episode->series->slug }}">
               <div class="relative w-full h-full">
                  <div class="wrp absolute bottom-0 w-full">
                     <div title="{{ $episode->series->title }}" class="w-full self-center">
                        <h1 class="text-center font-medium sm:text-lg text-slate-100">{{ $episode->series->title }}</h1>
                     </div>
                     <div class="bgTypes type w-fit h-fit mb-2 p-1 mt-1">
                        @if (!empty($episode->series->genre))
                           @foreach ($episode->series->genre->slice(1) as $item)
                           <h1 class="types text-xs font-semibold text-slate-200" id="">{{ $item->name }}</h1> 
                           @endforeach
                        @else
                            <p class="font-medium text-xs">N/A</p>
                        @endif
                     </div>
                  </div>
               </div>
            </a>
         </article>
         @endforeach
      </div>
   </div>
</section>



