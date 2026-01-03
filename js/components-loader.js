/**
 * Component Loader - Carga navbar y footer de forma dinámica
 * Uso: Incluir este script en todas las páginas ANTES del cierre </body>
 */

// Función para cargar un componente HTML
async function loadComponent(elementId, componentPath) {
  try {
    const response = await fetch(componentPath);
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const html = await response.text();
    const element = document.getElementById(elementId);
    if (element) {
      element.innerHTML = html;
      console.log(`✅ Componente cargado: ${componentPath}`);
    } else {
      console.error(`❌ No se encontró el elemento con ID: ${elementId}`);
    }
  } catch (error) {
    console.error(`❌ Error cargando ${componentPath}:`, error);
  }
}

// Función para resaltar el link activo del navbar
function highlightActiveNavLink() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  const navLinks = document.querySelectorAll('.nav-link');

  navLinks.forEach(link => {
    const linkHref = link.getAttribute('href');
    if (linkHref === currentPage ||
        (currentPage === '' && linkHref === 'index.html')) {
      link.classList.add('text-mint-600', 'font-bold');
      link.classList.remove('text-slate-dark');
    }
  });
}

// Cargar componentes cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', async () => {
  // Cargar navbar
  await loadComponent('navbar-placeholder', 'components/navbar.html');

  // Cargar footer
  await loadComponent('footer-placeholder', 'components/footer.html');

  // Esperar un tick para que el DOM se actualice
  setTimeout(() => {
    // Resaltar link activo
    highlightActiveNavLink();

    // Inicializar navegación (mobile menu, etc.)
    if (typeof initNavigation === 'function') {
      initNavigation();
    }
  }, 100);
});
