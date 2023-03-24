@extends('dashboard.main')

@section('dashboard')
<div class="max-w-screen-lg w-full absolute right-0 p-5 bg-dashform">
    <header class="flex items-center">
        <div title="New Series">
            <h1 class="text-slate-800 font-bold text-2xl">New<span class="text-primary text-2xl font-bold">Series</span>
            </h1>
            <div class="flex items-center gap-2">
                <button class="btn-check px-3 bg-blue-600 rounded-sm mt-1">
                    <span class="text-slate-200">manage</span>
                </button>
                <div class="check hidden">
                    <form action="/dashboard/series/bulk-delete" method="POST">
                        @csrf
                        @method('delete')
                        <div class="del-input">

                        </div>
                        <button onclick="return confirm('Are you sure')" id="bulk-delete-button">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="searchMe absolute w-full top-5 right-2 lg:w-[70%] sm:right-28">
                <input type="search" name="search" id="searchMe" class="absolute rounded-[2px] block px-2 py-1 xl:w-1/2 font-normal bg-dashform bg-opacity-80 bg-clip-padding border border-primary transition ease-in-out m-0 focus:border-primary focus:outline-none mb-2 right-2" placeholder="Search Series...">
            </div>
        </div>
        <form action="/dashboard/series/create">
            @csrf
            <div class="sm:absolute w-fit h-8 bg-primary opacity-85 items-center justify-center p-3 flex rounded-[2px] sm:right-4 sm:top-5 bottom-12 right-5 fixed">
                <button type="submit" class="flex items-center gap-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-slate-200"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 11h-2v3H8v2h3v3h2v-3h3v-2h-3zm1-9H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/></svg>
                  <h1 class="text-lg font-semibold text-slate-200">New</h1>
                </button>
              </div>
        </form>
    </header>    
    
            <table class="tab border-collapse w-full mt-3">
                <thead class="">
                    <tr class="text-left">
                        <th class="check hidden">Check</th>
                        <th>Num</th>
                        <th>Title</th>
                        <th>Create</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="alldata">
                    @php
                        $number = 1 + (($posts->currentPage()-1) * $posts->perPage());     
                    @endphp
                    @foreach ($posts as $series)      
                    <tr>
                        <td class="check hidden">
                            <input class="checkbox" type="checkbox" name="id" value="{{ $series->id }}">
                        </td>
                        <td>
                            {{-- <form action="/dashboard/episode/create/{{ $series->id }}">
                                @csrf
                                <button type="submit" class="text-xs ring-2 ring-lime-400 p-1 font-bold text-slate-900">New</button>
                            </form> --}}
                           {{ $number++ }}
                        </td>
                        <td>{{ $series->title }}</td>
                        <td>{{ $series->created_at->format('Y-m-d') }}</td>
                        <td class="flex m-2">
                            <a href="/dashboard/series/{{ $series->slug }}/edit">
                                <span class="material-icons-sharp">
                                    edit_note
                                </span>
                            </a>
                            <form action="/dashboard/series/{{ $series->slug }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure')">
                                    <span class="material-icons-sharp text-sm">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                   
                    @endforeach
                </tbody>
                <tbody id="Content" class="searchdata">
                </tbody>
            </table>
            {{ $posts->links() }}                
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
            url: '{{ URL::to('search') }}',
            data: {'search':$value},
                        
            success:function(data){
                if(data.data=="Data tidak ditemukan"){
                    $('#Content').html(data.data);
                }else{
                    $('#Content').html(data.data);
                }
            }
            });

        })
    })
</script>

<script>
    const checkb = document.querySelectorAll('.check')
    const btnCheck = document.querySelector('.btn-check')

    checkb.forEach(function(e){
        btnCheck.addEventListener('click', function(event){
            event.preventDefault()
            e.classList.toggle('hidden')
        })
    })
</script>
@endsection