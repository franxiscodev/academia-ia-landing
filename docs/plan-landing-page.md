# Plan de Desarrollo: Landing Page Academia de Habilidades Digitales con IA

## 🎯 Objetivo
Crear una landing page moderna, impactante y responsive para una academia que enseña a estudiantes (10-16 años) a usar IA como herramienta de aprendizaje, no solo como tecnología.

## 🎨 Dirección Estética

### Concepto: "Futurismo Educativo Vibrante"
- **Tono**: Moderno, tecnológico pero accesible, inspirador y familiar
- **Paleta de colores**: Inspirada en la infografía
  - Verde menta (#7DD3C0) como color principal
  - Coral/Salmón (#FF8B7B) como acento
  - Azul cielo suave (#A8D8EA)
  - Amarillo pastel (#FFD97D)
  - Blanco/crema como fondo (#FAFBF8)
  - Textos oscuros (#2C3E50)

### Tipografía
- **Display/Títulos**: Poppins o Montserrat (bold, impactante)
- **Cuerpo**: Inter o Work Sans (legible, moderna)
- CDN: Google Fonts

### Elementos Visuales
- Ilustraciones estilo flat/isométrico (similar a la infografía)
- Gradientes sutiles y suaves
- Iconos SVG animados
- Bordes redondeados generosos (border-radius: 16px-24px)
- Sombras sutiles pero presentes (box-shadow con múltiples capas)
- Efectos de glassmorphism en cards

## 📐 Estructura de Secciones

### 1. Hero Section (Gancho Principal)
**Elementos:**
- Título H1: "Academia de Habilidades Digitales con IA"
- Subtítulo: "Aprender a Aprender en la Era de la Inteligencia Artificial"
- Propuesta de valor clara
- CTA principal: "¡Asegurar la Plaza!"
- Imagen/ilustración de jóvenes con tecnología
- Animación de entrada tipo fade-in + slide-up

**Efectos:**
- Gradient animated background
- Parallax sutil en scroll
- Botón con hover effect (scale + shadow)
- Texto con typing effect opcional

### 2. Problema y Solución (Doble Valor)
**Elementos:**
- Pregunta provocadora central
- Dos columnas visuales:
  - Problema (consumidor pasivo)
  - Solución (creador activo)
- Diagrama de engranajes (Competencias digitales + Rendimiento académico)

**Efectos:**
- Cards con glassmorphism
- Hover tilt effect en las cards
- Iconos animados al hacer scroll visible (intersection observer)
- Línea conectora animada entre problema/solución

### 3. Características y Pedagogía Única
**Elementos:**
- 3 cards destacadas:
  1. Aprendizaje Basado en Proyectos (ABP)
  2. Enfoque Tool-agnostic
  3. Escalabilidad por Edad y Nivel
- Iconos representativos para cada característica
- Ejemplos concretos

**Efectos:**
- Staggered animation al scroll
- Cards con efecto lift on hover
- Badges/pills con los conceptos clave
- Background con pattern sutil

### 4. Contenido del Programa (La Ruta Anual)
**Elementos:**
- Timeline horizontal o vertical responsive
- 3 Trimestres claramente diferenciados:
  - T1: Fundamentos y Creatividad
  - T2: Investigación y Profundización
  - T3: Integración y Proyecto Final
- Para cada trimestre: módulos + proyecto final
- Iconos temáticos

**Efectos:**
- Timeline animada progresivamente
- Cards expandibles (accordion) para detalles
- Color coding por trimestre
- Progress indicators

### 5. Herramientas de Vanguardia (El Arsenal)
**Elementos:**
- Grid de herramientas (4 categorías):
  1. Modelos de Lenguaje (ChatGPT, Gemini, Copilot)
  2. Generación de Imagen (DALL-E 3, Canva)
  3. Generación de Video (Runway ML, Pika Labs)
  4. Aprendizaje y Metodología (ML for Kids, NotebookLM)
- Logos/iconos de cada herramienta
- Breve descripción de uso

**Efectos:**
- Grid con CSS Grid (responsive)
- Hover states con información adicional
- Pulse animation en iconos
- Filter effect al hover

### 6. Módulo Especializado: NotebookLM
**Elementos:**
- Destacado especial para estudiantes 13+
- Enfoque en el valor académico
- Screenshot o mockup de NotebookLM
- Beneficios específicos con bullet points

**Efectos:**
- Card destacada con borde especial
- Badge "Premium" o "Destacado"
- Animación de spotlight
- Before/After slider opcional

### 7. Video Section
**Elementos:**
- Iframe de YouTube/Vimeo o video embebido
- Thumbnail personalizado
- Play button grande y atractivo
- Título del video

**Efectos:**
- Modal para video en fullscreen
- Lazy loading
- Overlay oscuro con fade
- Custom controls styling

### 8. Fomento de la Metacognición (de la infografía)
**Elementos:**
- 2 puntos clave:
  1. Organizar y cuestionar sus propias fuentes
  2. Aprender a formular preguntas efectivas
- Visuales con cerebros/pensamiento
- Quote destacada: "La IA es un multiplicador de esfuerzo..."

**Efectos:**
- Split screen design
- Animated icons
- Quote con tipografía grande
- Background con ilustración sutil

### 9. CTA Final y Cierre
**Elementos:**
- Refuerzo del valor único
- Garantías
- Formulario de inscripción o botón a formulario externo
- Información de contacto
- Social proof (si existe)

**Efectos:**
- Full-width section con background diferente
- Form con validación visual
- Animated submit button
- Success/error states

### 10. Footer
**Elementos:**
- Logo
- Enlaces rápidos
- Información de contacto
- Redes sociales
- Copyright

**Efectos:**
- Simple y limpio
- Links con underline animation

## 🎬 Animaciones y Microinteracciones

### Animaciones de Entrada (Scroll-triggered)
```css
/* Principales efectos a implementar */
1. Fade-in + Slide-up
2. Staggered animations (delay incremental)
3. Scale-in para cards
4. Draw animation para líneas/borders
5. Counter animation para números
```

### Hover Effects
- Scale + Shadow lift en buttons
- Tilt en cards (3D rotation)
- Color shift en links
- Icon bounce/pulse

### Scroll Effects
- Parallax sutil en hero
- Progress bar superior
- Sticky navigation con background blur
- Intersection Observer para activar animaciones

## 🛠️ Stack Técnico

### HTML5
- Semantic markup
- Accessibility attributes (ARIA)
- Meta tags optimizados para SEO
- Open Graph para social sharing

### CSS
- **Tailwind CSS 3.x** (via CDN)
  ```html
  <script src="https://cdn.tailwindcss.com"></script>
  ```
- Custom CSS adicional para:
  - Animaciones específicas
  - Gradientes complejos
  - Efectos glassmorphism
  - Tipografía custom

### JavaScript Vanilla
- Intersection Observer API (scroll animations)
- Smooth scroll
- Mobile menu toggle
- Form validation
- Video modal
- Lazy loading de imágenes

### Librerías Opcionales (CDN)
- **AOS (Animate On Scroll)**: Para animaciones al scroll
  ```html
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  ```
- **Typed.js**: Para efecto de escritura
- **Lottie**: Para animaciones complejas (opcional)

## 📱 Responsive Design

### Breakpoints
- Mobile: < 640px
- Tablet: 640px - 1024px
- Desktop: > 1024px

### Estrategia Mobile-First
1. Diseñar primero para móvil
2. Expandir para tablet/desktop
3. Adaptar navegación (hamburger menu)
4. Ajustar tipografía (fluid typography)
5. Reorganizar grids (stack en móvil)

## 🎥 Video

### Ubicación
- Sección dedicada después del "Arsenal de Herramientas"
- Opción alternativa: Hero section con video de fondo

### Especificaciones
- Formato: MP4 (H.264)
- Duración recomendada: 1-2 minutos
- Resolución: 1920x1080
- Hosting: YouTube/Vimeo (para evitar consumo bandwidth)

### Implementación
```html
<!-- Opción 1: YouTube Embed -->
<iframe src="https://www.youtube.com/embed/VIDEO_ID" 
        frameborder="0" 
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
</iframe>

<!-- Opción 2: Video HTML5 con controles custom -->
<video controls poster="thumbnail.jpg">
  <source src="video.mp4" type="video/mp4">
</video>
```

## 📦 Estructura de Archivos

```
landing-page/
├── index.html              # Archivo principal
├── css/
│   └── styles.css          # CSS custom adicional
├── js/
│   └── main.js            # JavaScript funcional
├── assets/
│   ├── images/
│   │   ├── hero-illustration.svg
│   │   ├── icons/
│   │   └── tools-logos/
│   └── videos/
│       └── promo.mp4
└── README.md
```

## 🚀 Optimizaciones

### Performance
- Lazy loading de imágenes
- Minificación de CSS/JS en producción
- Preload de fuentes críticas
- Async loading de scripts no críticos
- Optimización de imágenes (WebP con fallback)

### SEO
- Title tag optimizado
- Meta description atractiva
- Structured data (JSON-LD)
- Alt text en todas las imágenes
- Heading hierarchy correcta (H1 > H2 > H3)

### Accessibility
- Contraste de colores WCAG AA
- Focus states visibles
- Keyboard navigation
- Skip to content link
- ARIA labels donde sea necesario

## 📝 Contenido de las Secciones (textos del PDF)

### Hero
- **H1**: "Academia de Habilidades Digitales con IA: Aprender a Aprender en la Era de la Inteligencia Artificial"
- **Subtítulo**: "Transformamos a su hijo/a (10 a 16 años) de consumidor pasivo en un creador activo de conocimiento, dominando la IA como su herramienta fundamental de estudio, investigación y creación personal."
- **CTA**: "¡Asegurar la Plaza! (Desarrollo y Autonomía Garantizados)"

### Doble Valor
- **Pregunta**: "¿Busca que su hijo/a no solo sepa usar la tecnología, sino que sepa pensar y aprender con ella?"
- **Solución**: "Nuestro programa combina el dominio técnico de los modelos generativos más punteros con una metodología pedagógica probada. El resultado es de 'Doble Valor': el alumno no solo adquiere competencias digitales de alto nivel, sino que mejora su rendimiento y autonomía en todas sus asignaturas escolares."

[... resto del contenido del PDF integrado ...]

## 🎨 Elementos Visuales de la Infografía a Implementar

1. **Cerebro con iconos** (consumidor pasivo vs creador activo)
2. **Engranajes conectados** (competencias digitales + rendimiento)
3. **Árbol con hojas multicolor** (crecimiento)
4. **Laptop con IA** (organización de fuentes)
5. **Nubes de pensamiento** (preguntas efectivas)
6. **Balanza** (quote central)

## ✅ Checklist de Implementación

- [ ] Estructura HTML5 semántica
- [ ] Sistema de grid responsive con Tailwind
- [ ] Paleta de colores custom en Tailwind config
- [ ] Tipografía Google Fonts integrada
- [ ] Hero section con animación de entrada
- [ ] Scroll animations con AOS o Intersection Observer
- [ ] Navegación sticky con blur
- [ ] Cards con glassmorphism y hover effects
- [ ] Timeline de programa animada
- [ ] Grid de herramientas responsive
- [ ] Sección de video funcional
- [ ] Formulario de contacto/inscripción
- [ ] Mobile menu hamburger
- [ ] Performance optimization (lazy loading)
- [ ] Testing en múltiples dispositivos
- [ ] Validación de accesibilidad
- [ ] Meta tags SEO completos

## 🎯 Próximos Pasos

1. **Wireframe/Mockup** (opcional): Crear sketch rápido de la estructura
2. **Desarrollo del HTML**: Estructura semántica completa
3. **Estilado con Tailwind**: Aplicar clases utility
4. **CSS Custom**: Animaciones y efectos especiales
5. **JavaScript**: Interactividad y animaciones
6. **Contenido**: Integrar todos los textos del PDF
7. **Imágenes**: Crear/conseguir ilustraciones necesarias
8. **Testing**: Responsive, browsers, accessibility
9. **Deploy**: Subir a hosting

## 💡 Sugerencias Adicionales

### Versión con React (opcional futura)
Si quisieras una versión más dinámica, podrías migrar a:
- Next.js para SEO y performance
- Framer Motion para animaciones avanzadas
- Componentes reutilizables

### CMS Simple
Para actualizar contenido sin código:
- Netlify CMS
- Forestry.io
- Tina CMS

### Analytics
- Google Analytics 4
- Hotjar para heatmaps
- Facebook Pixel (si hay campañas)

---

## 🎬 Workflow con Claude Code + VSCode

1. Crear el proyecto base con este plan
2. Usar Claude Code para generar código específico
3. Iterar sección por sección
4. Testing continuo en live server
5. Refinamiento de animaciones y efectos

**Prompt sugerido para Claude Code:**
"Crea una landing page HTML con Tailwind CSS siguiendo el plan detallado. Empieza con la estructura HTML completa y la sección Hero con animaciones de entrada. Usa la paleta de colores especificada y el estilo 'Futurismo Educativo Vibrante'."
