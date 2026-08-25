document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('.menu-toggle');
  const links = document.querySelector('.nav-links');
  if (toggle) toggle.addEventListener('click', () => links.classList.toggle('open'));
  const adminMenu = document.querySelector('.admin-menu');
  const side = document.querySelector('.admin-side');
  if (adminMenu) adminMenu.addEventListener('click', () => side.classList.toggle('open'));
});