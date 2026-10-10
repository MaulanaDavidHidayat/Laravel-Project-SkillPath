
#!/bin/sh
set -eu

DB_PATH="${DB_DATABASE:-/tmp/skillpath.sqlite}"

mkdir -p "$(dirname "$DB_PATH")"
touch "$DB_PATH"

mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

chmod -R 775 storage bootstrap/cache

php artisan migrate --force

exec php artisan serve \
    --host=0.0.0.0 \
    --port="${PORT:-10000}"
