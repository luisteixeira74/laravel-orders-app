#!/bin/sh
set -e

# Ajusta permissões em tempo de execução (volumes podem sobrescrever permissões)
echo "Ajustando permissões em storage e bootstrap/cache..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Executa o comando original (php-fpm, artisan, etc.)
exec "$@"
