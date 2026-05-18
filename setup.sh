#!/bin/bash

WP=/var/www/html

DB_HOST=$(echo "$WORDPRESS_DB_HOST" | cut -d: -f1)
DB_PORT=$(echo "$WORDPRESS_DB_HOST" | grep ":" | cut -d: -f2)
DB_PORT=${DB_PORT:-3306}

echo "[setup] Waiting for database at $DB_HOST:$DB_PORT..."
until mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$WORDPRESS_DB_USER" -p"$WORDPRESS_DB_PASSWORD" --skip-ssl --silent 2>/dev/null; do
    sleep 2
done
echo "[setup] Database ready."

# Start Apache in background
apache2-foreground &

echo "[setup] Waiting for Apache..."
until curl -sf "http://localhost/" > /dev/null 2>&1; do
    sleep 1
done

# Create wp-config.php if missing (the base image skips this when files already exist)
if [ ! -f "$WP/wp-config.php" ]; then
    echo "[setup] Creating wp-config.php..."
    wp config create \
        --allow-root \
        --path="$WP" \
        --dbname="$WORDPRESS_DB_NAME" \
        --dbuser="$WORDPRESS_DB_USER" \
        --dbpass="$WORDPRESS_DB_PASSWORD" \
        --dbhost="$WORDPRESS_DB_HOST"
fi

if ! wp core is-installed --allow-root --path="$WP" 2>/dev/null; then
    echo "[setup] Installing WordPress..."
    wp core install \
        --allow-root \
        --path="$WP" \
        --url="${WP_URL:-http://localhost:8090}" \
        --title="${WP_TITLE:-WordPress}" \
        --admin_user="${WP_ADMIN_USER:-admin}" \
        --admin_password="${WP_ADMIN_PASSWORD:-changeme}" \
        --admin_email="${WP_ADMIN_EMAIL:-admin@example.com}" \
        --skip-email

    echo "[setup] Installing Elementor..."
    wp plugin install elementor --activate --allow-root --path="$WP"
    echo "[setup] Done! WordPress + Elementor ready at ${WP_URL:-http://localhost:8090}"
else
    echo "[setup] WordPress already installed, skipping setup."
fi

wait
