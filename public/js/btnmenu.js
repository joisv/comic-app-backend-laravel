function menubtn()
{
 const blur = document.getElementById('blr')
 const navbar = document.getElementById('navbar')
 const mobileNav = document.querySelector('.mobile-nav')
 navbar.classList.toggle('-translate-x-full')
 navbar.classList.toggle('ease-in-out')
 blur.classList.toggle('blur-sm')
 mobileNav.classList.toggle('translate-x-32')
}