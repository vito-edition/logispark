# LogiSpark

Sitio web de LogiSpark — empresa de almacenamiento y logística. Montado con WordPress + Elementor sobre Docker, accesible públicamente via Pangolin.

## Stack

- **WordPress** + Elementor
- **MariaDB 10.11**
- **Docker Compose**
- **Pangolin** (reverse proxy / tunnel para acceso externo)

## Requisitos

- Docker y Docker Compose instalados
- Acceso al dominio configurado en Pangolin

## Puesta en marcha

1. Copia el fichero de entorno y ajusta los valores:

```bash
cp .env.example .env
```

2. Levanta los contenedores:

```bash
docker compose up -d
```

El script `setup.sh` se ejecuta automáticamente al arrancar e instala WordPress + Elementor si es la primera vez.

## Variables de entorno

| Variable | Descripción |
|---|---|
| `MYSQL_ROOT_PASSWORD` | Contraseña root de MariaDB |
| `MYSQL_DATABASE` | Nombre de la base de datos |
| `MYSQL_USER` | Usuario de la base de datos |
| `MYSQL_PASSWORD` | Contraseña del usuario |
| `WP_URL` | URL pública del sitio |
| `WP_TITLE` | Título del sitio |
| `WP_ADMIN_USER` | Usuario administrador de WordPress |
| `WP_ADMIN_PASSWORD` | Contraseña del administrador |
| `WP_ADMIN_EMAIL` | Email del administrador |

## Estructura

```
logispark/
├── Dockerfile          # Imagen custom de WordPress con WP-CLI
├── docker-compose.yml  # Servicios: wordpress + db
├── setup.sh            # Instalación automática al primer arranque
├── jaon/               # JSONs de contenido de las páginas
└── wordpress/          # Instalación de WordPress (volumen montado)
```

## URL pública

[https://logispark.pl.l0l.ovh](https://logispark.pl.l0l.ovh)
