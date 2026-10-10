
FROM php:8.3-cli-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git unzip \
        libsqlite3-dev libonig-dev \
        libxml2-dev libzip-dev \
        nodejs npm \
    && docker-php-ext-install \
        pdo_sqlite mbstring xml zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && composer install \
        --no-dev \
        --prefer-dist \
        --no-interaction \
        --no-progress \
        --optimize-autoloader \
    && npm install --no-audit --no-fund \
    && npm run build \
    && rm -rf node_modules

RUN chmod +x docker-entrypoint.sh

ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/tmp/skillpath.sqlite

EXPOSE 10000

ENTRYPOINT ["./docker-entrypoint.sh"]
