// Toggle menu for mobile
const menuIcon = document.getElementById('menu-icon');
const navLinks = document.querySelector('.nav-links');

menuIcon.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});

// Toggle dark mode
const modeToggle = document.getElementById('mode-toggle');

modeToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
  document.querySelector('nav').classList.toggle('dark-mode');
});
