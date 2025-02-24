const menuBtn=document.querySelector('.header__logo');
const hamBurger=document.querySelector('.header__logo__burger');
const nav=document.querySelector('.header__nav');
const menuNav=document.querySelector('.header__nav__menu');
const navItems=document.querySelectorAll('.header__nav__menu__item');

let showMenu=false;

menuBtn.addEventListener('click',toggleMenu);

function toggleMenu(){
  if(!showMenu){
    hamBurger.classList.add('open');
    nav.classList.add('open');
    menuNav.classList.add('open');
    navItems.forEach(item => item.classList.add('open'));
    showMenu=true;
  }
  else{
    hamBurger.classList.remove('open');
    nav.classList.remove('open');
    menuNav.classList.remove('open');
    navItems.forEach(item => item.classList.remove('open'));
    
    showMenu=false;
  }
}