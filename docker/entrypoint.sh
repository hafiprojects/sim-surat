#!/bin/sh

echo "Starting Laravel Application..."

# Wait for database port to be available
echo "Waiting for database connection..."
timeout 60 sh -c 'until nc -z db 3306; do sleep 1; done'

echo "Database port is open!"

# Give MySQL a few more seconds to fully initialize
sleep 5

# Run Laravel setup commands
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Fix permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 755 storage bootstrap/cache

# Check if database has been migrated
echo "Checking database status..."
if ! php artisan migrate:status >/dev/null 2>&1; then
    echo "Database not initialized. Running migrations..."
    php artisan migrate --force

    echo "Running database seeders..."
    php artisan db:seed --force

    echo "Database setup completed!"
else
    echo "Database already initialized. Skipping migrations."
fi

# Start supervisor
exec /usr/bin/supervisord -c /etc/supervisor.d/supervisord.ini
