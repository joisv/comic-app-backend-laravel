@extends('layouts.main')

@section('main')
{{-- <main class="flex flex-wrap justify-center"> --}}
  <div class="h-fit relative top-20 max-w-screen-lg flex flex-wrap justify-center">
    <button class="absolute w-4 h-4 border-b-4 border-l-4 border-slate-300 -rotate-45 top-0 right-2" onclick="return genreBtn()"></button>
    <h1 class="text-4xl text-slate-200 font-bold top-4 absolute right-3 opacity-50">Favourite</h1>
    <div class="cont absolute grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-1 w-full">
      
    </div>
</div>
  <div class="genre-nav absolute w-screen h-screen bg-bgDark p-2 -translate-y-full">
      <div class="w-full h-[90%] overflow-y-scroll grid grid-cols-3 gap-1 pt-10">
        @foreach ($genres as $genre)
        <a class="a h-14" id="{{ $genre->slug }}" href="/genre/{{ $genre->slug }}">
          <div class="h-14 bg-slate-800 p-2 flex items-center justify-center rounded-sm relative">
            <h1 class="z-50 text-lg font-semibold text-slate-200">{{ $genre->name }}</h1>
            <div class="absolute w-full h-full px-1">
              <h2 class="text-2xl text-slate-400 opacity-50 font-bold">{{ $genre->series_count }}</h2>
            </div>
          </div>
        </a>
        @endforeach
      </div>
      <button class="bg-primary px-2 py-1 text-slate-200 absolute bottom-5 right-2 text-lg" onclick="return genreBtn()">Search</button>
  </div>
 
{{-- </main> --}}
 
<script>
  $(document).ready(function(){
    $(".a").click(function(e){
        e.preventDefault();
        var id = $(this).attr("id");
        $.ajax({
            type: 'GET',
            url: '/genre/'+id,
            success: function(response){
              console.log(response);
              var base_url = 'http://127.0.0.1:8000/';
              var series = response.series;
              var seriesList = "";
              for(var i=0; i<series.length; i++){
                  seriesList += `<div class="image duration-200 ease-in">
                  <a href="${base_url}manga/${series[i].slug}">
                      <img class="w-full h-80 object-cover object-center relative bg-eps" src="${base_url}storage/${series[i].image}" alt="">
                      <div class="absolute text-slate-100 text-lg bottom-3 font-semibold txt-shadow flex justify-center">
                          <h1 class="text-center">${series[i].title}</h1>
                      </div>
                  </a>
                  </div>`;
              }
              $(".cont").html(seriesList);
            }
        });
    });
});

 function genreBtn(){
  document.querySelector('.genre-nav').classList.toggle('-translate-y-full')
 }
</script>
@endsection