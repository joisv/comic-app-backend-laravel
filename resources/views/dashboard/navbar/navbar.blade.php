<nav class="relative xl:hidden">
    <div class="w-full bg-transparent absolute p-2 flex items-center" id="top">
      <div>
        <button id="menu-btn" onclick="menuBtn()">
          <span class="material-icons-sharp text-3xl"> menu </span>
        </button>
      </div>
      <div class="absolute right-2">
        <span class="material-icons-sharp text-3xl">
          account_circle
          </span>
      </div>
    </div>
    {{-- menu --}}
    <div class="w-[50vw] h-screen absolute bg-dashform z-10 drop-shadow-2xl -left-full" id="nav">
      {{-- close button --}}
      <div class="absolute -right-7 top-1 p-1">
        <button class="flex items-center justify-center after:bg-yellow-500 after:w-9 after:h-9 after:blur-sm " onclick="menuBtn()">
          <span class="material-icons-sharp absolute z-10">
            close
            </span>
        </button>
      </div>
        <div class="w-full bg-rose-400 p-2 flex items-center">
          <div class="img-logo">
            <span class="material-icons-sharp text-3xl">
              logo_dev
              </span>
          </div>
          <div class="txt-logo mb-2 ml-3">
            <h1 class="font-semibold text-lg text-slate-100">Logo</h1>
          </div>
        </div>
        <div class="menu p-3 mx-auto">
              <a href="/dashboard" class="flex items-center hover:bg-sky-500 p-2">
                <svg xmlns="svge http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                <h3 class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Dashboard</h3>
              </a>
              <a href="/dashboard/series" class="flex items-center sm:hover:bg-sky-500 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10"><path d="M17,19.22H5V7h7V5H5C3.9,5,3,5.9,3,7v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-7h-2V19.22z"/><path d="M19,2h-2v3h-3c0.01,0.01,0,2,0,2h3v2.99c0.01,0.01,2,0,2,0V7h3V5h-3V2z"/></svg>
                <h3 class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Series</h3>
              </a>
              <a href="/dashboard/episode" class="flex items-center hover:bg-sky-500 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10"><path d="M0 0h24v24H0z" fill="none"/><path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9h-4v4h-2v-4H9V9h4V5h2v4h4v2z"/></svg>
                <h3 class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Episode</h3>
              </a>
              <a href="/dashboard/genre" class="flex items-center hover:bg-sky-500 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10"><path d="M5,5h2v1c0,1.1,0.9,2,2,2h6c1.1,0,2-0.9,2-2V5h2v5h2V5c0-1.1-0.9-2-2-2h-4.18C14.4,1.84,13.3,1,12,1S9.6,1.84,9.18,3H5 C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6v-2H5V5z M12,3c0.55,0,1,0.45,1,1s-0.45,1-1,1s-1-0.45-1-1S11.45,3,12,3z"/><path d="M21.75,12.25c-0.41-0.41-1.09-0.41-1.5,0L15.51,17l-2.26-2.25c-0.41-0.41-1.08-0.41-1.5,0l0,0c-0.41,0.41-0.41,1.09,0,1.5 l3.05,3.04c0.39,0.39,1.02,0.39,1.41,0l5.53-5.54C22.16,13.34,22.16,12.66,21.75,12.25z"/></svg>
                <h3 class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Genre</h3>
              </a>
              <a href="/dashboard/user" class="flex items-center hover:bg-sky-500 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10"><path d="M0 0h24v24H0z" fill="none"/><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                <h3 class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Add User</h3>
              </a>
              <a href="#" class="flex items-center hover:bg-sky-500 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.71 7.98L16.03 3.3c-.19-.19-.45-.3-.71-.3H8.68c-.26 0-.52.11-.7.29L3.29 7.98c-.18.18-.29.44-.29.7v6.63c0 .27.11.52.29.71l4.68 4.68c.19.19.45.3.71.3h6.63c.27 0 .52-.11.71-.29l4.68-4.68c.19-.19.29-.44.29-.71V8.68c.01-.26-.1-.52-.28-.7zM19 14.9L14.9 19H9.1L5 14.9V9.1L9.1 5h5.8L19 9.1v5.8z"/><circle cx="12" cy="16" r="1"/><path d="M12 7c-.55 0-1 .45-1 1v5c0 .55.45 1 1 1s1-.45 1-1V8c0-.55-.45-1-1-1z"/></svg>
                <h3 class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Reports</h3>
              </a>
              <a href="#" class="flex items-center hover:bg-sky-500 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" class="fill-primary group-hover:fill-dashform z-10"><path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/></svg>
                <h3 class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Setting</h3>
              </a>
              <form action="/logout" method="POST">
                @csrf
                <div class="flex items-center hover:bg-sky-500 p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" class="fill-red-500 group-hover:fill-dashform z-10"><path d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z"/><path d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z"/></svg>
                <button type="submit" class="ml-3 text-slate-300 font-semibold sm:text-lg text-sm">Logout</button>
              </div>
              </form>
        </div>
    </div>
</nav>
@if (request()->is(['dashboard', 'dashboard/episode', 'dashboard/series', 'dashboard/genre']))
  <nav>
    <div class="w-full h-full bg-dashform hidden xl:block max-w-[18%] fixed p-3">
        <div class="w-full h-screen">
      
          <div class="flex w-full justify-center">
            <div class="w-14 h-14 rounded-full absolute top-4 overflow-hidden flex border-2 border-primary">
              <img src="image/Contoh Pas Foto.png" alt="" class="w-full object-cover object-center">
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"  fill="#000000" class="w-16"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.35 18.5C8.66 17.56 10.26 17 12 17s3.34.56 4.65 1.5c-1.31.94-2.91 1.5-4.65 1.5s-3.34-.56-4.65-1.5zm10.79-1.38C16.45 15.8 14.32 15 12 15s-4.45.8-6.14 2.12C4.7 15.73 4 13.95 4 12c0-4.42 3.58-8 8-8s8 3.58 8 8c0 1.95-.7 3.73-1.86 5.12z"/><path d="M12 6c-1.93 0-3.5 1.57-3.5 3.5S10.07 13 12 13s3.5-1.57 3.5-3.5S13.93 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
          </div>
         
          <div class="mens w-full h-full mt-3 relative">
            <ul>
              <li>
                <a href="/dashboard">
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-primary hover:-translate-y-1 group ease-out duration-200 after:hover:ease-in-out after:hover:duration-200">
                    <svg xmlns="svge http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10 ml-6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                    <h3 class="menus font-bold text-xl text-primary group-hover:text-dashform z-10">Dashboard</h3>
                  </div>
                </a>
              </li>
              <li>
                <a href="/dashboard/series">
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-primary hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10 ml-6"><path d="M17,19.22H5V7h7V5H5C3.9,5,3,5.9,3,7v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-7h-2V19.22z"/><path d="M19,2h-2v3h-3c0.01,0.01,0,2,0,2h3v2.99c0.01,0.01,2,0,2,0V7h3V5h-3V2z"/></svg>
                    <h3 class="menus font-bold text-xl text-primary group-hover:text-dashform z-10">Series</h3>
                  </div>
                </a>
              </li>
              <li>
                <a href="/dashboard/episode">
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-primary hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10 ml-6"><path d="M0 0h24v24H0z" fill="none"/><path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9h-4v4h-2v-4H9V9h4V5h2v4h4v2z"/></svg>
                    <h3 class="menus font-bold text-xl text-primary group-hover:text-dashform z-10">Episode</h3>
                  </div>
                </a>
              </li>
              <li>
                <a href="/dashboard/genre">
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-primary hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10 ml-6"><path d="M5,5h2v1c0,1.1,0.9,2,2,2h6c1.1,0,2-0.9,2-2V5h2v5h2V5c0-1.1-0.9-2-2-2h-4.18C14.4,1.84,13.3,1,12,1S9.6,1.84,9.18,3H5 C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6v-2H5V5z M12,3c0.55,0,1,0.45,1,1s-0.45,1-1,1s-1-0.45-1-1S11.45,3,12,3z"/><path d="M21.75,12.25c-0.41-0.41-1.09-0.41-1.5,0L15.51,17l-2.26-2.25c-0.41-0.41-1.08-0.41-1.5,0l0,0c-0.41,0.41-0.41,1.09,0,1.5 l3.05,3.04c0.39,0.39,1.02,0.39,1.41,0l5.53-5.54C22.16,13.34,22.16,12.66,21.75,12.25z"/></svg>
                    <h3 class="menus font-bold text-xl text-primary group-hover:text-dashform z-10">Genre</h3>
                  </div>
                </a>
              </li>
              <li>
                <a href="/dashboard/user">
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-primary hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10 ml-6"><path d="M0 0h24v24H0z" fill="none"/><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <h3 class="menus font-bold text-xl text-primary group-hover:text-dashform z-10">Add User</h3>
                  </div>
                </a>
              </li>
              <li>
                <a href="">
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-primary hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" class="fill-primary group-hover:fill-dashform z-10 ml-6"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.71 7.98L16.03 3.3c-.19-.19-.45-.3-.71-.3H8.68c-.26 0-.52.11-.7.29L3.29 7.98c-.18.18-.29.44-.29.7v6.63c0 .27.11.52.29.71l4.68 4.68c.19.19.45.3.71.3h6.63c.27 0 .52-.11.71-.29l4.68-4.68c.19-.19.29-.44.29-.71V8.68c.01-.26-.1-.52-.28-.7zM19 14.9L14.9 19H9.1L5 14.9V9.1L9.1 5h5.8L19 9.1v5.8z"/><circle cx="12" cy="16" r="1"/><path d="M12 7c-.55 0-1 .45-1 1v5c0 .55.45 1 1 1s1-.45 1-1V8c0-.55-.45-1-1-1z"/></svg>
                    <h3 class="menus font-bold text-xl text-primary group-hover:text-dashform z-10">Report</h3>
                  </div>
                </a>
              </li>
              <li>
                <a href="/dashboard/settings">
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-primary hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" class="fill-primary group-hover:fill-dashform z-10 ml-6"><path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/></svg>
                    <h3 class="menus font-bold text-xl text-primary group-hover:text-dashform z-10">Settings</h3>
                  </div>
                </a>
              </li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <div class="w-full h-12 flex items-center justify-start gap-1 after:w-full after:h-12 after:absolute after:hover:bg-red-500 hover:-translate-y-1 group after:hover:ease-in-out after:hover:duration-200 ease-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" class="fill-red-500 group-hover:fill-dashform z-10 ml-6"><path d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z"/><path d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z"/></svg>
                  <button type="submit" class="font-bold text-xl text-red-500 group-hover:text-dashform z-10">Logout</button>
                </div>
                </form>
              </li>
            </ul>
           
          </div>
        </div>
    </div>
  </nav>

@endif