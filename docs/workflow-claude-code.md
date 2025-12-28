# Guía de Workflow con Claude Code + VSCode

## 📋 Preparación Inicial

### 1. Estructura del Proyecto
```bash
mkdir academia-ia-landing
cd academia-ia-landing
code .
```

### 2. Archivos Base a Crear
```
academia-ia-landing/
├── index.html
├── css/
│   └── custom.css
├── js/
│   └── main.js
├── assets/
│   ├── images/
│   │   └── (agregar ilustraciones)
│   └── videos/
│       └── (video promocional)
└── README.md
```

## 🤖 Prompts para Claude Code

### Prompt 1: Estructura HTML Base
```
Crea el archivo index.html para una landing page de una academia de IA para jóvenes (10-16 años).

Especificaciones:
- HTML5 semántico
- Incluir Tailwind CSS via CDN (https://cdn.tailwindcss.com)
- Google Fonts: Poppins (display) e Inter (body)
- Meta tags completos para SEO
- Open Graph tags para redes sociales
- Estructura con las siguientes secciones:
  1. Navbar sticky
  2. Hero section
  3. Problema y Solución (Doble Valor)
  4. Características (3 cards)
  5. Programa Anual (Timeline)
  6. Herramientas (Grid)
  7. Módulo NotebookLM
  8. Video section
  9. CTA final
  10. Footer

Usa la paleta de colores:
- Mint: #7DD3C0 (principal)
- Coral: #FF8B7B (acento)
- Sky: #A8D8EA
- Sunshine: #FFD97D
- Cream: #FAFBF8 (fondo)
- Slate-dark: #2C3E50 (texto)

Incluye la configuración custom de Tailwind en un <script> tag.
```

### Prompt 2: Hero Section con Animaciones
```
Desarrolla la Hero section con:
- Título principal: "Academia de Habilidades Digitales con IA"
- Subtítulo sobre transformar de consumidor pasivo a creador activo
- 2 botones CTA: "¡Asegurar la Plaza!" (primario) y "Ver Programa" (secundario)
- Ilustración/card con glassmorphism en el lado derecho
- Elementos decorativos flotantes (círculos con colores de la paleta)
- Animaciones de entrada: fade-in + slide-up con delays escalonados
- Badge superior con "Educación del Futuro, Hoy"
- Trust indicators abajo
- Scroll indicator animado
- Background con gradient mesh sutil
- Totalmente responsive (mobile-first)

Aplica los estilos de Tailwind personalizados y CSS custom cuando sea necesario.
```

### Prompt 3: Navbar Sticky con Blur
```
Crea una navbar sticky que:
- Tenga logo/nombre de la academia a la izquierda
- Links de navegación en el centro (Desktop)
- Botón CTA "Inscribirse" a la derecha
- Hamburger menu para móvil
- Background blur (glassmorphism) cuando se hace scroll
- Transición suave de transparente a blur
- z-index apropiado
- Links con underline animation on hover

JavaScript necesario para:
- Detectar scroll y aplicar clase .scrolled
- Toggle del mobile menu
- Smooth scroll a las secciones
```

### Prompt 4: Sección Doble Valor
```
Implementa la sección "Problema y Solución" con:
- Título centrado: "¿Busca que su hijo/a no solo sepa usar la tecnología, sino que sepa pensar y aprender con ella?"
- Dos columnas con cards glassmorphism:
  Izquierda (Problema): Consumidor Pasivo
  Derecha (Solución): Creador Activo
- Diagrama de engranajes en el centro (SVG inline o ilustración)
- Texto del "Doble Valor" debajo
- Animaciones al hacer scroll visible (Intersection Observer)
- Responsive: stack en móvil

Contenido del texto incluido en el archivo plan-landing-page.md
```

### Prompt 5: Cards de Características
```
Crea una grid de 3 características con:
1. Aprendizaje Basado en Proyectos
2. Enfoque Tool-agnostic
3. Escalabilidad por Edad

Cada card debe tener:
- Icono SVG representativo
- Título bold
- Descripción concisa
- Background con glassmorphism
- Hover effect: lift + shadow
- Border sutil con degradado
- Animación staggered al aparecer

Layout: 3 columnas en desktop, 1 columna en móvil
```

### Prompt 6: Timeline del Programa
```
Implementa una timeline vertical (móvil) / horizontal (desktop) con:
- 3 trimestres (T1, T2, T3)
- Cada trimestre tiene:
  - Badge con número
  - Título del enfoque
  - Lista de módulos
  - Proyecto final destacado
  - Color coding diferente por trimestre
- Línea conectora animada
- Cards expandibles con más detalles
- Iconos temáticos para cada trimestre

Usa los textos del PDF para el contenido de cada trimestre.
```

### Prompt 7: Grid de Herramientas
```
Crea un grid responsive de herramientas organizadas por categoría:

4 Categorías:
1. Modelos de Lenguaje (ChatGPT, Gemini, Copilot)
2. Generación de Imagen (DALL-E 3, Canva)
3. Generación de Video (Runway ML, Pika Labs)
4. Aprendizaje (ML for Kids, NotebookLM)

Cada herramienta:
- Logo/icono (placeholder o SVG simple)
- Nombre
- Breve descripción de uso
- Hover state con información adicional
- Pulse animation sutil en iconos

Grid: 4 columnas desktop, 2 columnas tablet, 1 columna móvil
```

### Prompt 8: Sección de Video
```
Implementa una sección para video con:
- Título "Descubre cómo funciona"
- Iframe de YouTube responsive (ratio 16:9)
- O: Custom video player con thumbnail
- Play button grande centrado
- Modal/lightbox al hacer click
- Lazy loading del video
- Botón de cierre del modal
- Overlay oscuro

El video se puede embeber después, por ahora usa un placeholder.
```

### Prompt 9: JavaScript Funcional
```
Crea el archivo js/main.js con:

1. Intersection Observer para animaciones al scroll
   - Detectar cuando elementos entran en viewport
   - Aplicar clases de animación

2. Navbar scroll behavior
   - Agregar clase .scrolled cuando scroll > 50px
   - Cambiar background a glassmorphism

3. Mobile menu toggle
   - Abrir/cerrar menu hamburger
   - Animación del icono (X)

4. Smooth scroll
   - Links de navegación con smooth scroll
   - Offset para navbar fija

5. Form validation (si hay formulario)
   - Validación de email
   - Estados de éxito/error

Usa vanilla JavaScript, sin frameworks.
```

### Prompt 10: CSS Custom Adicional
```
Crea css/custom.css con:

1. Glassmorphism helper classes
2. Gradient backgrounds personalizados
3. Hover effects complejos
4. Animaciones custom no disponibles en Tailwind:
   - Gradient animation
   - Draw border animation
   - Float animation con variaciones
5. Responsive utilities adicionales
6. Print styles
7. Accessibility improvements

Debe complementar Tailwind, no reemplazarlo.
```

### Prompt 11: Optimización y Testing
```
Optimiza el proyecto para producción:
1. Minifica CSS custom
2. Comprime imágenes
3. Lazy loading de todas las imágenes
4. Preload de fuentes críticas
5. Async loading de scripts no críticos
6. Añade meta tags faltantes
7. Structured data (JSON-LD) para SEO
8. Verifica accesibilidad (contraste, ARIA labels)
9. Testing responsive en diferentes breakpoints
10. Performance checklist
```

## 🔄 Workflow Iterativo

### Paso 1: Crear estructura base
```bash
# En Claude Code
"Crea la estructura HTML base según el plan"
```

### Paso 2: Desarrollar sección por sección
```bash
# Ir iterando
"Ahora agrega la Hero section"
"Perfecto, ahora la sección de Doble Valor"
"Continúa con las características..."
```

### Paso 3: Añadir interactividad
```bash
"Implementa el JavaScript para animaciones al scroll"
"Agrega la funcionalidad del mobile menu"
```

### Paso 4: Refinar y pulir
```bash
"Ajusta los espaciados para que sean más consistentes"
"Mejora las animaciones de las cards"
"Optimiza para móvil"
```

### Paso 5: Contenido y ajustes finales
```bash
"Integra todos los textos del PDF"
"Añade placeholder para las imágenes faltantes"
"Verifica que todos los links funcionen"
```

## 🧪 Testing Local

### Usar Live Server en VSCode
1. Instalar extensión "Live Server"
2. Click derecho en index.html
3. "Open with Live Server"
4. Navegar a http://localhost:5500

### DevTools para Responsive
- Cmd/Ctrl + Shift + M (toggle device toolbar)
- Probar diferentes dispositivos
- Lighthouse audit para performance

## 📤 Deployment

### Opción 1: GitHub Pages (Gratis)
```bash
# Crear repo
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin [URL]
git push -u origin main

# Activar GitHub Pages en Settings
```

### Opción 2: Netlify (Gratis)
1. Arrastrar carpeta del proyecto a netlify.com/drop
2. O conectar repo de GitHub
3. Deploy automático

### Opción 3: Vercel (Gratis)
1. npm i -g vercel
2. vercel login
3. vercel --prod

## ✅ Checklist Final

- [ ] Todas las secciones implementadas
- [ ] Contenido del PDF integrado
- [ ] Responsive en móvil/tablet/desktop
- [ ] Animaciones funcionando
- [ ] Navigation smooth scroll
- [ ] Mobile menu funcional
- [ ] Video embebido o placeholder
- [ ] Formulario con validación
- [ ] Meta tags SEO completos
- [ ] Open Graph para social sharing
- [ ] Accesibilidad verificada
- [ ] Performance optimizada
- [ ] Cross-browser testing
- [ ] Deploy en hosting

## 🎨 Recursos Adicionales

### Ilustraciones (Gratis)
- unDraw.co
- Storyset by Freepik
- Humaaans
- Open Peeps

### Iconos
- Heroicons
- Lucide
- Phosphor Icons
- Tabler Icons

### Gradientes
- uiGradients
- Gradient Hunt
- CSS Gradient

### Inspiración
- Awwwards
- Dribbble
- Land-book
- SaaS Landing Page

---

**Nota**: Con Claude Code puedes iterar rápidamente. No dudes en pedir ajustes, refinamientos o cambios completos de dirección estética si algo no te convence.
