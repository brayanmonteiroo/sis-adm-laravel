#!/bin/bash

set -e

# Corrige permissões
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Instala dependências do Node e faz build do Vite se não existir o manifest
if [ ! -f /var/www/public/build/manifest.json ]; then
    npm install
    npm run build
fi

exec "$@"