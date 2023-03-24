@extends('dashboard.main')

@section('dashboard')
<div class=" max-w-screen-lg w-full absolute right-0 p-5 bg-dashform">

    <div class="flex items-center relative">
        <div title="New Series" class="">
            <h1 class="text-slate-800 font-bold text-2xl">New<span class="text-primary text-2xl font-bold">Episode</span>
            </h1>
            <div class="searchMe absolute w-full top-1 right-2 lg:w-[70%] sm:right-28">
                <input type="search" name="search" id="searchMe" class="absolute rounded-[2px] block px-2 py-1 xl:w-1/2 font-normal bg-dashform bg-opacity-80 bg-clip-padding border border-primary transition ease-in-out m-0 focus:border-primary focus:outline-none mb-2 right-2" placeholder="Search Series...">
            </div>
        </div>
        <div class="">
            <form action="/dashboard/episode/create">
                @csrf
                    <div class="sm:absolute w-fit h-8 bg-primary opacity-85 items-center justify-center p-3 flex rounded-[2px] sm:right-4 sm:top-1 bottom-12 right-5 fixed">
                    <button type="submit" class="flex items-center gap-1">
                       <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-slate-200"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 11h-2v3H8v2h3v3h2v-3h3v-2h-3zm1-9H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/></svg>
                        <h1 class="text-lg font-semibold text-slate-200">New</h1>
                    </button>
                </div>
            </form>
        </div>
    </div>    
    
            <table class="tab border-collapse w-full mt-3">
                <thead class="">
                    <tr class="text-left">
                        <th>Num</th>
                        <th>Title</th>
                        <th>Create</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="alldata">
                    @php
                    $number = 1 + (($episodes->currentPage()-1) * $episodes->perPage());     
                    @endphp
                    @foreach ($episodes as $episode)      
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>
                            {{ $episode->title }}<br>
                            <span class="text-slate-400 text-xs"> @if($episode->series)
                                <p>{{ $episode->series->title }}</p>
                            @else
                                <p>Series not found</p>
                            @endif</span>
                        </td>
                        <td>{{ $episode->created_at->format('Y-m-d')}}</td>
                        <td class="flex m-2">
                            <a href="/dashboard/episode/{{ $episode->slug }}/edit">
                                <span class="material-icons-sharp">
                                    edit_note
                                </span>
                            </a>
                            <form action="/dashboard/episode/{{ $episode->slug }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure?')">
                                    <span class="material-icons-sharp text-sm">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tbody id="Cont" class="searchdata">

                </tbody>
            </table>
            {{ $episodes->links() }}
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#searchMe').on('keyup', function(){
            $value = $(this).val();

            if($value){
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
                
            }
            
            $.ajax({
            type: 'get',
            url: '{{ URL::to('search/episode') }}',
            data: {'search':$value},
                        
            success:function(data){
                if(data.data=="Data tidak ditemukan"){
                    $('#Cont').html(data.data);
                }else{
                    $('#Cont').html(data.data);
                }
            }
});

        })
    })
</script>
@endsection