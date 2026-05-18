# LOGISPARK GROUP — Templates Elementor
## Guía de importación y configuración

Este paquete contiene **7 templates de Elementor** listos para importar. Cada uno corresponde a una página de la web.

---

## ¿QUÉ HAY DENTRO?

```
logispark-home.json          → Inicio (puzzle grid + counters)
logispark-exterior.json      → Almacenamiento Exterior
logispark-nave.json          → Nave Industrial
logispark-trasteros.json     → Parques de Trasteros
logispark-logikey.json       → LogiKey™ + popup Mystery + banner flotante
logispark-contacto.json      → Contacto con formulario + WhatsApp + Email
logispark-mystery.json       → Mystery Shipper (landing premium)
```

Cada plantilla contiene **toda la página completa** dentro de un widget HTML de Elementor:
- HTML estructurado
- CSS con todos los estilos
- JavaScript para animaciones, popups, contadores y formularios

**Esto garantiza que se ven exactamente igual que en el preview**, sin perder ni un pixel.

---

## REQUISITOS

1. **WordPress 6.0 o superior** (gratis)
2. **Elementor Free** (gratis, plugin oficial del repositorio: https://es.wordpress.org/plugins/elementor/)
3. **NO necesitas Elementor Pro** ni ningún plugin de pago.

Tema recomendado:
- **Hello Elementor** (gratis, oficial de Elementor)
- O cualquier tema minimalista (Astra Free, GeneratePress Free, etc.)

---

## INSTALACIÓN PASO A PASO

### PASO 1 — Instalar Elementor y tema

1. **Plugins → Añadir nuevo** → buscar "Elementor" → **Instalar y activar** (Elementor Free).
2. **Apariencia → Temas → Añadir nuevo** → buscar "Hello Elementor" → **Instalar y activar**.

---

### PASO 2 — Importar cada plantilla como página

Para cada uno de los 7 archivos JSON:

1. WP Admin → **Páginas → Añadir nueva**.
2. Dale título (por ejemplo "Inicio").
3. Pulsa el botón azul **"Editar con Elementor"**.
4. Una vez dentro del editor de Elementor, pulsa el icono de **carpeta** (📁) que verás en el panel izquierdo (al lado del icono de añadir widget).
5. Se abrirá la **"Biblioteca de plantillas"**. Arriba pulsa la pestaña **"Mis plantillas"**.
6. Pulsa el botón **"Importar plantillas"** (arriba a la derecha).
7. Selecciona el archivo `.json` correspondiente (por ejemplo `logispark-home.json`).
8. Cuando termine la importación, busca la plantilla en la lista y pulsa **"Insertar"**.
9. La plantilla se cargará en tu página.
10. Pulsa **"Actualizar"** o **"Publicar"** (verde, abajo-izquierda).

**Repite este proceso para cada uno de los 7 archivos.**

---

### PASO 3 — Slugs de las páginas

Cuando crees cada página, ponle el slug correcto (debajo del título, en la URL):

| Página | Slug obligatorio |
|---|---|
| Inicio | `inicio` |
| Almacenamiento Exterior | `almacenamiento-exterior` |
| Nave Industrial | `nave-industrial` |
| Parques de Trasteros | `parques-trasteros` |
| LogiKey | `logikey` |
| Contacto | `contacto` |
| Mystery Shipper | `mystery-shipper` |

⚠️ **Importante**: los enlaces internos del diseño (el popup de Mystery en LogiKey, los enlaces del menú, etc.) apuntan a estos slugs. Si los cambias, los enlaces dejarán de funcionar.

---

### PASO 4 — Configurar como portada estática

1. **Ajustes → Lectura**.
2. **"Tu página de inicio muestra"** → marca **"Una página estática"**.
3. **Página de inicio** → selecciona **"Inicio"**.
4. **Guardar cambios**.

---

### PASO 5 — Plantilla "Canvas" en cada página

Las plantillas tienen su propio header/navbar y footer. Para que no se duplique con el del tema:

1. Edita cada página con Elementor.
2. En el icono ⚙️ del panel izquierdo (Page Settings), busca **"Diseño de página"**.
3. Selecciona **"Elementor Canvas"** (lienzo en blanco, sin header/footer del tema).
4. Actualiza la página.

Esto debe hacerse en las 7 páginas.

---

## EDITAR TEXTOS, IMÁGENES O COLORES

Como cada plantilla es un widget HTML único, para editar:

1. Edita la página con Elementor.
2. Pulsa sobre el contenido (te aparece el widget "HTML").
3. En el panel izquierdo verás el código fuente.
4. Busca el texto que quieres cambiar (Ctrl+F dentro del editor) y modifícalo directamente.
5. Pulsa **"Actualizar"**.

Para cambios visuales más profundos (cambiar la estructura, mover secciones), lo más recomendable es pedírmelo a mí (Claude): te paso el JSON actualizado y vuelves a importarlo.

---

## FORMULARIO DE CONTACTO

El formulario de la página Contacto está preparado para enviar emails a **hola@logispark.es**.

En esta versión Elementor el formulario abre el cliente de email del usuario con todo precargado. Si quieres que se envíe automáticamente desde el servidor (sin abrir cliente de email), instala el plugin gratuito **WPForms Lite** o **Contact Form 7**, configúrales el destino `hola@logispark.es` y reemplaza el formulario en el widget HTML por el código del plugin.

---

## INDEXACIÓN AUTOMÁTICA EN GOOGLE SHEETS

Para que cada contacto se registre automáticamente en una hoja compartida con Astrid:

1. Instala **Contact Form 7** + **CF7 to Spreadsheets** (ambos gratis).
2. Crea una Google Sheet llamada "Logispark Leads".
3. Sigue las instrucciones del plugin para conectarla (te pedirá autorizar tu cuenta de Google).
4. Cada formulario enviado creará una fila nueva con: nombre, empresa, email, servicio, mensaje y fecha.

Tiempo de configuración: ~15 minutos. Coste: 0€.

---

## WHATSAPP FLOTANTE

El botón verde de WhatsApp aparece **automáticamente en todas las páginas** (excepto Mystery Shipper). Lleva al número de Astrid: **+34 663 31 14 07**.

Para cambiar el número, edita el widget HTML de cada página y busca:
```
https://wa.me/34663311407
```
Reemplázalo por el nuevo número (formato internacional sin `+` ni espacios).

---

## SOPORTE Y PROBLEMAS

- **El diseño se ve roto**: verifica que pusiste la plantilla "Elementor Canvas" (paso 5).
- **El popup Mystery no aparece en LogiKey**: limpia caché del navegador (Ctrl+F5).
- **El formulario no envía**: en esta versión abre el cliente de email del usuario. Si quieres envío automático, ver sección "Formulario de contacto".
- **No aparece el botón WhatsApp**: cada plantilla lo trae embebido. Si no lo ves, asegúrate de haber importado la versión correcta.

---

## RESUMEN RÁPIDO PARA GERMAN

1. Instalar **Elementor Free** + tema **Hello Elementor**.
2. Crear 7 páginas en WordPress, con los slugs indicados arriba.
3. Cada página: importar el JSON correspondiente desde "Mis plantillas" en Elementor.
4. Cada página: configurar Layout = **Elementor Canvas**.
5. Ajustes → Lectura → portada estática = "Inicio".
6. Comprobar que todo se ve bien en navegador (Ctrl+F5).
7. Configurar plugin CF7 + CF7 to Spreadsheets para indexar leads en Google Sheet (opcional pero recomendado).

Total: ~30 minutos.
