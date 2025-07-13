#!/bin/bash

set -e

# Corrige permissões
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Instala dependências do Node
npm install

# Inicia o Vite em modo dev em background
npm run dev &

# Inicia o PHP-FPM (ou outro comando padrão)
exec "$@"
