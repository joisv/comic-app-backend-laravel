@extends('layouts.main')

@section('main')
<div class="w-full relative h-full bg-rose-600">
    <div class="max-w-screen-lg grid mx-auto relative">
        <a href="/manga/{{ $series[0]->slug }}">
      <div class="bg-slider swipe w-full bg-cover bg-top h-[50vh] absolute" style="background-image: url('{{ isset($series[0]->image) ? asset('storage/'.$series[0]->image) : asset('image/Sample.jpg') }}')">
        <div title="Secret Class" class="absolute bottom-0 p-2">
            <h1 class="text-2xl font-semibold text-slate-200 drop-shadow-lg"><span class="text-red-600">1.</span> {{ $series[0]->title }}</h1>
            <h2 class="text-base font-medium text-slate-300">genre</h2>
            <h2></h2>
        </div>
    </div>
</a>
    <div class="infos w-full bg-opacity-80 mt-[3px] absolute top-[50vh]">
        <div class="content grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-[3px]">
            @foreach ($series->skip(1) as $post)
                
            <a href="/manga/{{ $post->slug }}">
                <div style="background-image: url('{{ isset($post->image) ? asset('storage/'.$post->image) : asset('image/Sample.jpg') }}')" class="bg-eps w-full h-52 md:h-64 lg:h-72 xl:h-80 bg-center bg-cover">
                    <div class="w-full h-full p-2 relative">
                        <h3 class="text-sm font-semibold text-slate-700 absolute bottom-1">{{ $post->title }}</h3>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    </div>
</div>
@endsection