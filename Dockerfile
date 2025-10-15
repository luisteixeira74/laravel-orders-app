# Build image for Laravel
FROM php:8.3-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libicu-dev \
    libxml2-dev \
    zlib1g-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring zip intl xml

# Instala Composer
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia todos os arquivos do projeto
COPY src/ ./

# Instala dependências do Laravel (agora com o artisan presente)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ajusta permissões para storage e cache
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Copia script de entrypoint e dá permissão de execução
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Porta do PHP-FPM
EXPOSE 9000

# Define entrypoint e comando padrão
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]
