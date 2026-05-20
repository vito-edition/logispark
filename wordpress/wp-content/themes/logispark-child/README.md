# Logispark Group — Tema WordPress
## Tema hijo de Hello Elementor

---

## 📁 Estructura del paquete

```
logispark-child/
├── style.css                          ← Estilos principales + info del tema
├── functions.php                      ← Enqueue scripts, menús, AJAX contacto
├── header.php                         ← Navbar completo con logo SVG
├── footer.php                         ← Footer + wp_footer()
├── front-page.php                     ← Página de inicio (Home)
├── js/
│   └── main.js                        ← Animaciones, formulario AJAX, counters
├── page-templates/
│   ├── page-almacenamiento-exterior.php
│   ├── page-nave-industrial.php
│   ├── page-trasteros.php
│   └── page-logikey.php  (crear manualmente — ver abajo)
├── template-parts/
│   ├── cta.php                        ← Sección CTA reutilizable
│   └── contact-form.php               ← Formulario de contacto
└── assets/
    └── img/                           ← ⚠️ Aquí van las imágenes (ver lista abajo)
```

---

## 🚀 Instalación paso a paso

### 1. Requisitos previos
- WordPress 6.x instalado
- Plugin **Hello Elementor** activado (tema padre)
- Plugin **Elementor** (gratis o Pro)

### 2. Subir el tema
1. Ve a **WordPress Admin → Apariencia → Temas → Añadir nuevo → Subir tema**
2. Sube el archivo ZIP de `logispark-child`
3. Activa el tema

### 3. Asignar templates a las páginas
Crea estas páginas en **WordPress Admin → Páginas → Añadir nueva**:

| Título de la página      | Template a asignar                  | Slug sugerido              |
|--------------------------|-------------------------------------|----------------------------|
| Inicio                   | `front-page.php` (automático)       | (página de inicio)         |
| Almacenamiento Exterior  | Almacenamiento Exterior             | `almacenamiento-exterior`  |
| Nave Industrial          | Nave Industrial                     | `nave-industrial`          |
| Parques de Trasteros     | Parques de Trasteros                | `parques-trasteros`        |
| LogiKey™                 | LogiKey Mystery Shipper             | `logikey`                  |
| Contacto                 | Página por defecto                  | `contacto`                 |
| Política de privacidad   | Página por defecto                  | `politica-privacidad`      |
| Aviso legal              | Página por defecto                  | `aviso-legal`              |

Para asignar el template: en el editor de página → columna derecha → **Atributos de página → Template**

### 4. Configurar el menú
1. Ve a **Apariencia → Menús → Crear nuevo menú**
2. Nombre: "Menú Principal"
3. Añade las páginas: Inicio, Almacenamiento Exterior, Nave Industrial, Parques de Trasteros, LogiKey™, El Grupo, Contacto
4. En "Ubicación del tema" marca **Menú Principal**
5. Guardar

### 5. Página de inicio estática
1. Ve a **Ajustes → Lectura**
2. Selecciona "Una página estática"
3. Página de inicio: **Inicio**

### 6. Subir las imágenes
Sube estas imágenes a la carpeta `assets/img/` del tema:

| Nombre de archivo en el tema        | Imagen original                                          |
|-------------------------------------|----------------------------------------------------------|
| `hero-home.webp`                    | ios-2-scaled-1-440x293.jpg                               |
| `exterior-hero.webp`                | ios-2-scaled-1-440x293.jpg                               |
| `exterior-maquinaria.webp`          | imagen_para_dentro_de_almacenamiento_exterior.jfif        |
| `campa-les-franqueses.webp`         | WhatsApp_Image_2026-04-22_at_14_41_58.jpeg               |
| `campa-mollet.webp`                 | WhatsApp_Image_2026-04-22_at_14_42_27.jpeg               |
| `campa-parets.webp`                 | WhatsApp_Image_2026-04-22_at_14_42_27__1_.jpeg           |
| `nave-hero.webp`                    | vista-aerea-almacen-mercancias-(...).avif                 |
| `nave-interior.webp`                | almacenaje_interior_.jpeg                                |
| `almacen-logistico.webp`            | almacen-logistico.jpg                                    |
| `trasteros-hero.webp`               | contenedores_storae.webp                                 |
| `logikey-hero.webp`                 | caucasian-businesswoman-(...).webp                       |

**Convertir a .webp** (recomendado): usa https://squoosh.app o el comando:
```bash
cwebp -q 80 imagen.jpg -o imagen.webp
```

---

## ⚙️ Plugins recomendados

| Plugin | Para qué | Gratis/Pro |
|--------|----------|-----------|
| **Elementor** | Page builder visual | Gratis |
| **Yoast SEO** | Meta tags, sitemap, Open Graph | Gratis |
| **WP Rocket** | Caché y rendimiento | Pro (~€49/año) |
| **Smush** | Compresión automática de imágenes | Gratis |
| **UpdraftPlus** | Backups automáticos | Gratis |
| **Wordfence** | Seguridad | Gratis |

---

## 📧 Formulario de contacto

El formulario usa **AJAX nativo de WordPress** (sin plugins). Los leads llegan al email del administrador configurado en **Ajustes → General → Email**.

Para cambiar el email de recepción: editar `functions.php` línea:
```php
$to = get_option('admin_email');
// Cambiar por:
$to = 'info@logispark.es';
```

---

## 🎨 Personalización rápida

### Cambiar colores
En `style.css`, modificar las variables CSS:
```css
:root {
  --azul:    #1A3875;  /* Azul corporativo */
  --naranja: #E8420A;  /* Naranja pin */
  --negro:   #0D1117;  /* Negro digital */
}
```

### Cambiar datos de contacto
Buscar y reemplazar en todos los archivos PHP:
- `info@logispark.es` → tu email
- `+34 629 22 00 66` → tu teléfono

---

## 🌐 SEO — Meta tags por página

Añadir con Yoast SEO o manualmente en `wp_head`:

| Página | Title sugerido | Description sugerida |
|--------|---------------|---------------------|
| Home | Logispark Group — Logística en el Vallès | Campas, nave IFS y LogiKey™ en el Vallès Oriental. Tu socio logístico en Barcelona. |
| Exterior | Almacenamiento Exterior Vallès \| Logispark | 65.000 m² de campa propia para maquinaria, vehículos y contenedores en el Vallès Oriental. |
| Nave | Nave Logística IFS Barcelona \| Logispark | Almacén logístico certificado IFS en Montornès. 10.000 m², 14.000 palés, todos los servicios. |
| Trasteros | Trasteros Profesionales Construcción Vallès | Contenedores llave en mano para encofradores, paletas y constructoras. Sin IBI ni permanencia. |
| LogiKey | Mystery Shipper Logístico Cataluña \| LogiKey™ | Negociación logística anónima. Conseguimos el precio real de mercado sin revelar tu marca. |

---

## ✅ Checklist antes de lanzar

- [ ] Tema activado y páginas creadas con sus templates
- [ ] Menú principal configurado
- [ ] Imágenes subidas a `assets/img/` en formato .webp
- [ ] Email de contacto configurado en functions.php
- [ ] Yoast SEO configurado con meta tags por página
- [ ] SSL activado (HTTPS) en el hosting
- [ ] Sitemap enviado a Google Search Console
- [ ] Google Analytics 4 instalado
- [ ] Política de privacidad y aviso legal publicados
- [ ] Test de formulario de contacto funcionando
- [ ] PageSpeed > 85 en mobile

---

*Logispark Group · logisparkgroup.com · Mayo 2025*


---

## 🕵️ Integración Mystery Shipper

La página LogiKey™ incluye un **banner flotante** que aparece tras scrollar 300px y un **modal de contacto** con formulario completo.

**Archivos involucrados:**
- `page-templates/page-logikey.php` — Llama al template part
- `template-parts/mystery-floater.php` — Banner + Modal HTML
- `style.css` — Estilos del banner y modal (sección "MYSTERY SHIPPER")
- `js/main.js` — Lógica de scroll, apertura modal y envío AJAX

**Funcionalidad:**
- El banner aparece automáticamente al scrollar
- El usuario puede cerrarlo (✕) o pulsar el botón azul "Pulsa el botón azul →"
- Al pulsar, se abre modal con formulario: nombre, email, teléfono, volumen, empresa, mensaje
- El formulario envía vía AJAX al email del admin (función `logispark_handle_contact` en `functions.php`)
- Confirmación visual + cierre automático tras envío correcto
- Cerrable con ESC o clic fuera del modal

**Email que recibirá el admin:**
- Subject: `Nuevo lead Logispark — LogiKey Mystery Shipper — [nombre]`
- Body: todos los campos del formulario
