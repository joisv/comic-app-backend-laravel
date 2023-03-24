<div class="w-auto h-8 bg-primary absolute flex items-center justify-center p-2 rounded-br-lg top-3 z-10 sm:hidden" id="kanan">
    <button id="btn-menu" onclick="menubtn()">
        <h1 class="text-slate-300 text-sm font-bold">Menu</h1>
    </button>
  </div>
<nav id="navbar" class="navbar relative z-10 duration-200 sm:hidden scroll-y -translate-x-full">
    <div class="wrap-menu w-screen h-screen bg-bgDark absolute p-2">
        {{-- btn --}}
        <div class="w-full h-16">
            <div class="logo">
                {{-- <div class="w-16 h-16 mb-2 flex items-center justify-center">
                    <span class="material-icons text-6xl text-slate-300">
                        diamond
                        </span>
                    <img src="" alt="">
                </div> --}}
                <div class="search relative">
                        <input type="text"  class="searchMe w-full h-10 rounded-[2px] block px-2 py-1 xl:w-1/2 font-normal text-slate-200 bg-primary bg-opacity-80 bg-clip-padding border border-none focus:outline-none mb-2 right-2 text-lg search-sm" placeholder="Search..." autofocus>
                        {{-- <div class="absolute top-0 right-0">
                            <span class="material-icons text-2xl text-slate-100">
                                search
                            </span>
                        </div> --}}
                        <div class="hidden bg-slate-900 w-full p-2 absolute Cont z-50 search-sm">
                            
                        </div> 
                </div>
            </div>
            <div class="w-full h-screen grid items-center">
                <div class="flex relative -top-32">
                    <div class="menu w-full grid justify-items-end">
                        <ul class="mobile-nav translate-x-32 ease-in-out duration-1000 mr-2">
                               <li class="flex items-center">
                                           <a class="" href="/">
                                       <span class="ml-3 text-slate-200">Home</span>
                                   </a>
                                       </li>
                                   <li class="flex items-center">
                                           <a class="" href="#">
                                       <span class="ml-3">List</span>
                                   </a>
                                       </li>
                                   <li class="flex items-center">
                                           <a class="" href="/trending">
                                       <span class="ml-3">Trending</span>
                                   </a>
                                   <li class="flex items-center">
                                           <a class="" href="/genre">
                                       <span class="ml-3">Genre</span>
                                   </a>
                                       </li>
                                   <li class="flex items-center">
                                           <a class="" href="#">
                                       <span class="ml-3">Schedule</span>
                                   </a>
                                   <li class="flex items-center">
                                           <a class="" href="/favourite">
                                       <span class="ml-3">Favourite</span>
                                   </a>
                        </ul>
                        <div class="flex items-center absolute left-12">
                            <button onclick="menubtn()">
                                <svg width="27" height="27" viewBox="0 0 27 27" class="fill-slate-200 w-12 h-12">
                                    <path d="M23.625 12.375H7.68375L11.7112 8.33625L10.125 6.75L3.375 13.5L10.125 20.25L11.7112 18.6638L7.68375 14.625H23.625V12.375Z"/>
                                    </svg>
                            </button>
                        </div>
                    </div>
                    <div class="bg-bgDark border-primary border-l-4 w-[55%] z-10">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</nav>
<nav class="navbar">
    <div class="relative z-50 hidden sm:block">
        <div class="absolute px-5 py-3 flex gap-14 w-full">
            <div class="w-full h-auto bg-transparent">
                <a href="/">
                <h1 class="text-primary font-bold text-2xl group-hover:text-slate-200">XX<span class="group-hover:text-primary font-bold text-2xl text-slate-200 text-center">Toon</span></h1>
            </a>
            </div>
                <div class="absolute z-50 flex items-center justify-end w-[70%]">
                    <ul>
                        <div class="flex items-center gap-4">
                            <li class="font-normal text-slate-200 text-lg"><a class="nav-item" href="/">Home</a></li>
                            <li class="font-normal text-slate-200 text-lg"><a class="nav-item" href="/list">List</a></li>
                            <li class="font-normal text-slate-200 text-lg"><a class="nav-item" href="/trending">Trending</a></li>
                            <li class="font-normal text-slate-200 text-lg"><a class="nav-item" href="/genre">Genre</a></li>
                            <li class="font-normal text-slate-200 text-lg"><a class="nav-item" href="/schedule">Schedule</a></li>
                            <li class="font-normal text-slate-200 text-lg"><a class="nav-item" href="/favourite">Favourite</a></li>
                        </div>
                    </ul>
                </div>
            <div class="relative w-full -top-1">
                    <input type="search" class="searchMe search-lg absolute rounded-sm block px-2 py-1 w-1/2 font-normal text-slate-200 bg-primary bg-opacity-80 bg-clip-padding border border-none focus:outline-none mb-2 right-2 text-lg" placeholder="search here...">
            </div>
        </div>
        <div class="Cont hidden search-lg absolute w-1/3 bg-slate-900 right-7 top-12 px-5 py-2 rounded-sm">
        </div>
    </div>
</nav>
<script type="text/javascript">
    $(document).ready(function(){
        $('.searchMe').on('keyup', function(){
            $value = $(this).val();

            if($value){
                $('.Cont').show();
                $('.Cont').removeClass("hidden");
            } else {
                $('.Cont').hide();
                $('.Cont').addClass("hidden");
            }
            
            $.ajax({
            type: 'get',
            url: '{{ URL::to('search/series') }}',
            data: {'search':$value},
                        
            success:function(data){
                if(data.data=="Data Not Found"){
                    $('.Cont').html(data.data);
                }else{
                    $('.Cont').html(data.data);
                }
            }
        });

        })
    })
</script>
<script>
    const currentPage = document.location.pathname;
    const navLinks = document.querySelectorAll(".nav-item");
    navLinks.forEach(link => {
        if (link.getAttribute("href") === currentPage) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });

    window.onload = function() {
    // Cek ukuran layar saat ini
    var screenWidth = window.innerWidth;
    
    // Jika layar diatas atau sama dengan 640px
    if (screenWidth >= 640) {
        // Hapus elemen dengan class "search-sm"
        var elementsToRemove = document.getElementsByClassName("search-sm");
        while (elementsToRemove.length > 0) {
        elementsToRemove[0].parentNode.removeChild(elementsToRemove[0]);
        }
    } else { // Jika layar dibawah 640px
        // Hapus elemen dengan class "search-lg"
        var elementsToRemove = document.getElementsByClassName("search-lg");
        while (elementsToRemove.length > 0) {
        elementsToRemove[0].parentNode.removeChild(elementsToRemove[0]);
        }
    }
}
</script>