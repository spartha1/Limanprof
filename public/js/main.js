// Lógica para mostrar/ocultar el menú móvil
const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');

// Mostrar/ocultar menú móvil principal
if (menuToggle && mobileMenu) {
  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
}

// Lógica para los submenús
const subMenuToggles = document.querySelectorAll('.menu-toggle');

subMenuToggles.forEach(toggle => {
  toggle.addEventListener('click', () => {
    // Encuentra el contenido del submenú asociado
    const subMenu = toggle.nextElementSibling;

    // Alterna la visibilidad del submenú
    if (subMenu) {
      subMenu.classList.toggle('hidden');
    }

    // Opcional: Cierra otros submenús del mismo nivel
    const parent = toggle.closest('.menu-item');
    const siblingMenus = parent.parentElement.querySelectorAll('.menu-content');

    siblingMenus.forEach(menu => {
      if (menu !== subMenu) {
        menu.classList.add('hidden');
      }
    });
  });
});
