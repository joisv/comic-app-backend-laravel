{{-- <div class="wrrr w-full sm:max-w-screen-lg relative top-24 h-fit mx-auto">
<h1 class="text-slate-200 absolute right-2 text-2xl -top-10 opacity-0 ease-in duration-200 font-medium" id="trend" title="Trending">Trending</h1>
<div class="trendd relative grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-1 w-full">
    <div class="bg-image h-52 md:h-64 lg:h-72 xl:h-80 bg-cover" style="background-image: url('{{ isset($trendings[0]->image) ? asset('storage/'.$trendings[0]->image) : asset('image/Sample.jpg') }}')"></div>
    <div class="trends bg-image h-52 md:h-64 lg:h-72 xl:h-80 bg-cover translate-y-8 duration-200" style="background-image: url('{{ isset($trendings[1]->image) ? asset('storage/'.$trendings[1]->image) : asset('image/Sample.jpg') }}')"></div>
    <div class="trend1 bg-image w-full h-52 md:h-64 lg:h-72 xl:h-80 bg-cover translate-y-16 duration-200" style="background-image: url('{{ isset($trendings[2]->image) ? asset('storage/'.$trendings[2]->image) : asset('image/Sample.jpg') }}')"></div>
    <div class="trend2 bg-image w-full h-52 md:h-64 lg:h-72 xl:h-80 bg-cover translate-y-24 duration-200 hidden sm:block" style="background-image: url('{{ isset($trendings[3]->image) ? asset('storage/'.$trendings[3]->image) : asset('image/Sample.jpg') }}')"></div>
    <div class="trend3 bg-image w-full h-52 md:h-64 lg:h-72 xl:h-80 bg-cover translate-y-32 duration-200 hidden lg:block" style="background-image: url('{{ isset($trendings[4]->image) ? asset('storage/'.$trendings[4]->image) : asset('image/Sample.jpg') }}')"></div>
 
</div>
</div> --}}
{{-- <script>
    const onn = document.getElementById('trend')
    // console.log(onn);
    const one = document.querySelector('.trends')
    const ones = document.querySelector('.trend1')
    const oness = document.querySelector('.trend2')
    const onesss = document.querySelector('.trend3')

    window.addEventListener('scroll', function() {
        const scrollMe = window.pageYOffset
    //   console.log(scrollMe)
        if( scrollMe > 1357 ){
            onn.style.opacity = "1"
           one.classList.remove('translate-y-8')
           ones.classList.remove('translate-y-16')
           oness.classList.remove('translate-y-24')
           onesss.classList.remove('translate-y-32')
           one.classList.toggle('ease-in-out', true);
           ones.classList.toggle('ease-in-out', true);
           oness.classList.toggle('ease-in-out', true);
           onesss.classList.toggle('ease-in-out', true);
        } else {
            onn.style.opacity = "0"
            one.classList.add('translate-y-8');
            ones.classList.add('translate-y-16');
            oness.classList.add('translate-y-24');
            onesss.classList.add('translate-y-32')
            ones.classList.toggle('ease-in-out', false);
            one.classList.toggle('ease-in-out', false);
            oness.classList.toggle('ease-in-out', false);
            onesss.classList.toggle('ease-in-out', false);
        }
    })
</script> --}}