@extends('layouts.main')

@section('main')
<main>
    <div class="h-fit relative top-11 max-w-screen-lg mx-auto ">
        <h1 class="text-4xl text-slate-200 font-bold top-12 absolute right-3 opacity-50">Favourite</h1>
        <div class="cont relative grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-1 w-full">
            
        </div>
    </div>

</main>
<script>
    let data = JSON.parse(localStorage.getItem("data"));
    for (let i = 0; i < data.length; i++) {
    let title = data[i].title;
    let image = data[i].image;
    let link = data[i].links;
    let container = document.querySelector(".cont");
    container.innerHTML += `<div class="image duration-200 ease-in">
                <a href="${link}">
                    <img class="w-full h-80 object-cover object-center relative bg-eps lazy" data-src="${image}" alt="">
                    <div class="absolute text-slate-100 text-lg z-20 bottom-3 font-semibold txt-shadow w-full flex justify-center">
                        <h1 class="text-center">${title}</h1>
                    </div>
                </a>
            </div> `;
    }

    const elements = document.querySelectorAll('.image');
     if(elements){
         const elementWidth = elements[0].clientWidth;

         // Get the width of the parent container
         const containerWidth = document.querySelector('.cont').clientWidth;

         // Calculate the number of elements that fit in one row
         const elementsPerRow = Math.floor(containerWidth / elementWidth);
         
         var rows = Math.ceil(elements.length / elementsPerRow)
         for (let i = 0; i < rows; i++) {
             let row = [];
             for (let j = 0; j < elementsPerRow; j++) {
                 let index = i * elementsPerRow + j;
                 if (index < elements.length) {
                     row.push(elements[index]);
                 }
             }
             for (let k = 0; k < row.length; k++) {
                 row[k].style.transform = `translate3d(0px, ${58 * (k + 1)}px, 0px)`;
             }
             let previousScroll = 0;

            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                console.log(currentScroll);
                if (currentScroll > previousScroll && currentScroll > 55) {
                    for (let k = 0; k < row.length; k++) {
                        row[k].style.transform = `translate3d(0px, 0px, 0px)`;
                    }
                } else {
                    for (let k = 0; k < row.length; k++) {
                        row[k].style.transform = `translate3d(0px, ${58 * (k + 1)}px, 0px)`;
                    }
                }
                previousScroll = currentScroll;
            });

         }
     } else {
         console.log('Element not found');
     }
    
 </script>
@endsection