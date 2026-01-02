# 🎓 ialogía - Academia de Habilidades Digitales con IA

Landing page para la Academia de Habilidades Digitales con Inteligencia Artificial. Proyecto educativo de **ArteUX** enfocado en transformar jóvenes de 10 a 16 años en creadores activos de conocimiento.

---

## 📋 Tabla de Contenidos

- [Características](#características)
- [Tecnologías](#tecnologías)
- [Instalación Rápida](#instalación-rápida)
- [Uso con Docker](#uso-con-docker)
- [Configuración del Formulario](#configuración-del-formulario)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Desarrollo Local](#desarrollo-local)
- [Deploy](#deploy)
- [Contribuir](#contribuir)

---

## ✨ Características

- ✅ **Diseño Responsivo** - Funciona perfectamente en móvil, tablet y desktop
- ✅ **Formulario de Contacto Funcional** - Con validación HTML5 + JavaScript + backend PHP
- ✅ **Backend PHP** - Procesamiento de formularios, envío de emails y guardado en BD
- ✅ **Base de Datos MySQL** - Almacenamiento de solicitudes de inscripción
- ✅ **Docker Ready** - Entorno completo con Docker Compose
- ✅ **Sistema de Diseño Custom** - Paleta de colores vibrantes y futurista
- ✅ **Animaciones Suaves** - Transiciones y efectos visuales optimizados
- ✅ **SEO Optimizado** - Meta tags, Open Graph, Twitter Cards
- ✅ **Accesibilidad** - ARIA labels y navegación por teclado

---

## 🛠 Tecnologías

### Frontend
- HTML5 (semántico)
- Tailwind CSS 3.x (via CDN)
- Vanilla JavaScript (ES6+)
- Google Fonts (Poppins + Inter)

### Backend
- PHP 8.2
- MySQL 8.0
- Apache

### DevOps
- Docker & Docker Compose
- Git & GitHub

---

## 🚀 Instalación Rápida

### Prerrequisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado
- Git instalado

### Pasos

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/academia-ia-landing.git
   cd academia-ia-landing
   ```

2. **Configurar variables de entorno**
   ```bash
   # Copiar el archivo de ejemplo
   cp .env.example .env

   # Editar .env con tus credenciales
   # (usar un editor de texto como VSCode, Notepad, etc.)
   ```

3. **Levantar los servicios con Docker**
   ```bash
   docker-compose up -d
   ```

4. **Acceder a la aplicación**
   - Landing page: http://localhost:8080
   - phpMyAdmin: http://localhost:8081

---

## 🐳 Uso con Docker

### Comandos básicos

```bash
# Iniciar los contenedores
docker-compose up -d

# Ver logs en tiempo real
docker-compose logs -f

# Detener los contenedores
docker-compose down

# Reiniciar los servicios
docker-compose restart

# Ver estado de los contenedores
docker-compose ps

# Eliminar todo (contenedores + volúmenes)
docker-compose down -v
```

### Servicios disponibles

| Servicio | Puerto | Descripción |
|----------|--------|-------------|
| **web** | 8080 | Servidor web (PHP + Apache) |
| **db** | 3307 | Base de datos MySQL |
| **phpmyadmin** | 8081 | Gestor visual de MySQL |

---

## 📧 Configuración del Formulario

### Archivo .env

Edita el archivo `.env` con tu configuración:

```env
# Email donde llegarán las solicitudes
CONTACT_EMAIL=info@ialogia.es

# Email remitente (From)
FROM_EMAIL=noreply@ialogia.es

# Base de datos
DB_HOST=db
DB_PORT=3306
DB_NAME=academia_ia
DB_USER=academia_user
DB_PASSWORD=tu_password_seguro

# Modo debug (true en desarrollo, false en producción)
DEBUG=true
```

### Configurar envío de emails (Producción)

Para que el formulario envíe emails en **producción**, necesitas configurar un servidor SMTP. Opciones:

1. **SendGrid** (recomendado) - 100 emails/día gratis
2. **Mailgun** - 5,000 emails/mes gratis
3. **SMTP de tu hosting** - Si tu hosting incluye email

Modifica `backend/contact.php` para usar SMTP en lugar de `mail()`.

---

## 📁 Estructura del Proyecto

```
academia-ia-landing/
├── index.html                  # Página principal
├── backend/
│   └── contact.php            # Backend del formulario
├── database/
│   └── init.sql               # Script de inicialización de BD
├── assets/
│   ├── images/
│   │   ├── logos/
│   │   │   └── ialogia-logo-final.png
│   │   └── illustrations/
│   │       └── hero-aprender.png
│   └── videos/                # (futuro)
├── docs/
│   ├── plan-landing-page.md   # Plan de diseño
│   └── progreso.md            # Log de progreso
├── docker-compose.yml         # Configuración de Docker
├── .env                       # Variables de entorno (NO subir a git)
├── .env.example               # Plantilla de variables
├── .gitignore                 # Archivos a ignorar en git
└── README.md                  # Este archivo
```

---

## 💻 Desarrollo Local

### Sin Docker (servidor local)

Si prefieres NO usar Docker, puedes usar cualquier servidor local:

**Opción 1: Python**
```bash
python -m http.server 8000
# Visita: http://localhost:8000
```

**Opción 2: PHP Built-in Server**
```bash
php -S localhost:8000
# Visita: http://localhost:8000
```

**Opción 3: Live Server (VSCode)**
- Instala la extensión "Live Server"
- Click derecho en `index.html` > "Open with Live Server"

⚠️ **Nota:** El formulario **NO funcionará** sin un servidor PHP + MySQL configurado.

---

## 🚀 Deploy

### Netlify / Vercel (solo frontend)

Para un deploy rápido **sin formulario backend**:

1. Conecta tu repo de GitHub a Netlify/Vercel
2. Configuración:
   - Build command: (vacío)
   - Publish directory: `.`
3. Deploy automático

⚠️ El formulario no funcionará. Considera usar:
- **Netlify Forms** (servicio nativo)
- **Formspree** (servicio externo)
- **API serverless** (Netlify Functions)

### Hosting tradicional (con PHP + MySQL)

Para hostings con **cPanel** (SiteGround, Hostinger, etc.):

1. **Subir archivos** via FTP
2. **Importar base de datos**:
   - Crea una BD en cPanel
   - Importa `database/init.sql` desde phpMyAdmin
3. **Configurar .env**:
   - Actualiza credenciales de BD del hosting
   - Actualiza emails
4. **Verificar permisos**:
   - `backend/` debe tener permisos 755

---

## 📊 Base de Datos

### Tabla: contacts

Campos almacenados:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | INT | ID autoincremental |
| parent_name | VARCHAR(100) | Nombre del padre/madre |
| email | VARCHAR(100) | Email de contacto |
| phone | VARCHAR(20) | Teléfono |
| student_name | VARCHAR(100) | Nombre del estudiante |
| student_age | TINYINT | Edad (10-16) |
| message | TEXT | Mensaje opcional |
| status | ENUM | Estado: pending, contacted, enrolled, rejected |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Última actualización |

### Consultas útiles

```sql
-- Ver todas las solicitudes
SELECT * FROM contacts ORDER BY created_at DESC;

-- Ver solo pendientes
SELECT * FROM contacts WHERE status = 'pending';

-- Estadísticas
SELECT * FROM contact_stats;

-- Contactos de los últimos 7 días
CALL GetRecentContacts(7);
```

---

## 🤝 Contribuir

¿Quieres contribuir? ¡Genial!

1. Fork el proyecto
2. Crea una rama: `git checkout -b feature/nueva-funcionalidad`
3. Commit: `git commit -m 'Agrega nueva funcionalidad'`
4. Push: `git push origin feature/nueva-funcionalidad`
5. Abre un Pull Request

---

## 📄 Licencia

Proyecto privado de **ArteUX** - Todos los derechos reservados © 2026

---

## 📞 Contacto

- **Email:** info@ialogia.es
- **Web:** [www.arteux.top](https://www.arteux.top)

---

## 📝 Changelog

### v1.0.0 (2026-01-02)
- ✅ Formulario de contacto funcional
- ✅ Backend PHP con validación
- ✅ Docker Compose configurado
- ✅ Base de datos MySQL
- ✅ phpMyAdmin integrado
- ✅ Documentación completa

### v0.1.0 (2025-12-28)
- ✅ Estructura HTML completa
- ✅ Diseño responsivo
- ✅ Hero section con imagen
- ✅ Video de YouTube integrado
- ✅ Iconos SVG personalizados
- ✅ Logo optimizado

---

**Hecho con ❤️ por ArteUX**
