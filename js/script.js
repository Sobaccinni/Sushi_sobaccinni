function toggleMenu() {
    const menu = document.querySelector('.burger-menu');
    const overlay = document.querySelector('.overlay');
    const icon = document.querySelector('.burger__menu_icon');
    menu.classList.toggle('active');
    overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
    icon.style.display = icon.style.display === 'none' ? 'block' : 'none';
}