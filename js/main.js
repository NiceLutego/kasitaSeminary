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

document.querySelector('form').reset();

function formValidation(){
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;

  if(username ==="" || password ===""){
    document.getElementById('error').innerHTML= "<span style='color:red;'>Fill all blank spaces!</span>"

    if(username.length<5 && password.length<5){
      document.getElementById('error').innerHTML = "<spna style='color:red;'>The number of characters must be greater than 5</spna>";
    }
    else{
      document.getElementById('error').innerHTML = "<span style='color:green;'>Medium password</span>"
    }
  }
  else{
    document.getElementById('error').innerHTML = "<span style='color:green;'>successful!</span>"
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const modeToggle = document.getElementById('mode-toggle');
  const currentMode = localStorage.getItem('theme') || 'light';

  document.body.classList.add(currentMode);

  modeToggle.addEventListener('click', () => {
      const newMode = document.body.classList.contains('light') ? 'dark' : 'light';

      document.body.classList.remove('light', 'dark');
      document.body.classList.add(newMode);

      localStorage.setItem('theme', newMode);
  });
});

