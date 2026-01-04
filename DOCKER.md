# Docker Setup for SIM Surat

This Laravel project includes Docker configuration for easy deployment.

## Services

- **app**: Laravel application with PHP 8.1-FPM and Nginx
- **db**: MySQL 8.4 LTS database
- **phpmyadmin**: Database management tool (optional)

## Prerequisites

Before starting, ensure you have installed:
- Docker (version 20.10 or higher)
- Docker Compose (version 2.0 or higher)

## Step-by-Step Setup Guide

### Step 1: Prepare Environment File

First, copy the example environment file and configure it for Docker:

```bash
# Copy environment file
cp .env.example .env
```

### Step 2: Update Environment Configuration

Open `.env` file and update the database settings to match Docker configuration:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=sim_surat
DB_USERNAME=root_ss
DB_PASSWORD=root_ss123
MYSQL_ATTR_SSL_CA=
```

**Important Notes:**
- `DB_HOST=db` - This is the Docker service name, not localhost
- Credentials must match those in `docker-compose.yaml`
- `MYSQL_ATTR_SSL_CA=` disables SSL for local development

### Step 3: Build Docker Images

Build the Docker images for the first time:

```bash
docker-compose build
```

This will:
- Install PHP 8.1 and required extensions
- Install Composer dependencies
- Set up Nginx and Supervisor
- Configure PHP settings

### Step 4: Start All Services

Start all containers in detached mode:

```bash
docker-compose up -d
```

This starts three services:
- `app` - Laravel application (port 8000)
- `db` - MySQL database (port 3307)
- `phpmyadmin` - Database admin tool (port 8080)

### Step 5: Wait for Services to Initialize

Check if all services are running:

```bash
docker-compose ps
```

All containers should show status as "Up". Wait about 10-15 seconds for MySQL to fully initialize.

### Step 6: Fix Storage Permissions

Laravel needs write access to storage directories:

```bash
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
docker-compose exec app chmod -R 755 storage bootstrap/cache
```

**Why?** The mounted volume uses your local user permissions, but PHP-FPM runs as `www-data` inside the container.

### Step 7: Clear Laravel Cache

Clear any cached configuration:

```bash
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
```

### Step 8: Run Database Migrations

Create database tables:

```bash
docker-compose exec app php artisan migrate
```

### Step 9: Seed Database (Optional)

If you want to populate the database with initial data:

```bash
docker-compose exec app php artisan db:seed
```

### Step 10: Verify Installation

Check if everything is working:

```bash
# Check migration status
docker-compose exec app php artisan migrate:status

# Test database connection
docker-compose exec app php artisan db:show
```

### Step 11: Access Your Application

Open your browser and navigate to:

- **Laravel Application**: http://localhost:8000
- **PhpMyAdmin**: http://localhost:8080
  - Server: `db`
  - Username: `root`
  - Password: `roots_pw123`

## Success! 🎉

Your Laravel application should now be running. If you see the Laravel welcome page or your application's login page, everything is working correctly.

## Daily Development Commands

### Viewing Logs

```bash
# View all logs
docker-compose logs

# View app logs only
docker-compose logs app

# Follow logs in real-time
docker-compose logs -f app

# View last 50 lines
docker-compose logs --tail=50 app
```

### Starting and Stopping

```bash
# Stop all containers
docker-compose down

# Stop and remove volumes (WARNING: deletes database data)
docker-compose down -v

# Start containers
docker-compose up -d

# Restart specific service
docker-compose restart app

# Rebuild and restart
docker-compose up -d --build
```

### Running Artisan Commands

```bash
# General format
docker-compose exec app php artisan [command]

# Examples:
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan make:controller UserController
docker-compose exec app php artisan route:list
docker-compose exec app php artisan queue:work
```

### Clearing Cache

```bash
# Clear all caches
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear

# Clear compiled classes
docker-compose exec app php artisan clear-compiled

# Optimize for production
docker-compose exec app php artisan optimize
```

### Accessing Container Shell

```bash
# Access app container
docker-compose exec app sh

# Access database container
docker-compose exec db sh

# Run commands as root
docker-compose exec -u root app sh
```

### Installing Dependencies

```bash
# Install PHP packages
docker-compose exec app composer install
docker-compose exec app composer update

# Install specific package
docker-compose exec app composer require package/name
```

## Database Management

### Using PhpMyAdmin (Web Interface)

1. Open http://localhost:8080
2. Login credentials:
   - **Server**: `db`
   - **Username**: `root`
   - **Password**: `roots_pw123`
3. Select `sim_surat` database from the left sidebar

### Using MySQL CLI

```bash
# Connect as root user
docker-compose exec db mysql -u root -proots_pw123

# Connect as application user
docker-compose exec db mysql -u root_ss -proot_ss123 sim_surat

# Run SQL query directly
docker-compose exec db mysql -u root -proots_pw123 -e "SHOW DATABASES;"

# Import SQL file
docker-compose exec -T db mysql -u root -proots_pw123 sim_surat < backup.sql

# Export database
docker-compose exec db mysqldump -u root -proots_pw123 sim_surat > backup.sql
```

## File Storage & Volumes

The application files are mounted as a volume, so changes you make locally are immediately reflected in the container.

**Important:** After editing files locally, you may need to fix permissions:

```bash
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

## Troubleshooting

### Problem: 500 Internal Server Error

**Solution:**
```bash
# Fix storage permissions
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
docker-compose exec app chmod -R 755 storage bootstrap/cache

# Clear cache
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear

# Check logs
docker-compose logs app
docker-compose exec app tail -50 storage/logs/laravel.log
```

### Problem: Database Connection Failed

**Symptoms:** "Name does not resolve" or "Connection refused"

**Solution:**
```bash
# 1. Verify DB_HOST in .env is set to 'db' (not localhost or 127.0.0.1)
# 2. Check if database is running
docker-compose ps

# 3. Check database logs
docker-compose logs db

# 4. Test connection
docker-compose exec app php artisan db:show

# 5. Restart services
docker-compose restart
```

### Problem: Changes Not Reflecting

**Solution:**
```bash
# Clear all Laravel caches
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear

# Restart PHP-FPM
docker-compose restart app
```

### Problem: Port Already in Use

**Symptoms:** "bind: address already in use"

**Solution:**
```bash
# Check what's using the port
sudo lsof -i :8000
sudo lsof -i :3307
sudo lsof -i :8080

# Kill the process or change port in docker-compose.yaml
# For example, change "8000:80" to "8001:80"
```

### Problem: Permission Denied Errors

**Solution:**
```bash
# Fix ownership
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chown -R www-data:www-data /var/www/html/bootstrap/cache

# Fix permissions
docker-compose exec app chmod -R 755 /var/www/html/storage
docker-compose exec app chmod -R 755 /var/www/html/bootstrap/cache
```

### Complete Fresh Start

If everything is broken and you want to start over:

```bash
# Stop and remove everything (WARNING: deletes all data)
docker-compose down -v

# Remove old images
docker-compose rm -f

# Rebuild from scratch
docker-compose build --no-cache

# Start fresh
docker-compose up -d

# Fix permissions
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache

# Run migrations
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

## Production Deployment

For production deployment, consider these changes:

### 1. Update Environment Variables

In `.env`:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

### 2. Update docker-compose.yaml

```yaml
environment:
  - APP_ENV=production
  - APP_DEBUG=false
```

### 3. Security Checklist

- [ ] Change all default passwords (database, root, etc.)
- [ ] Use strong, randomly generated passwords
- [ ] Remove PhpMyAdmin or restrict access with authentication
- [ ] Set up SSL/TLS certificates (use nginx-proxy or Traefik)
- [ ] Enable database backups
- [ ] Set up log rotation
- [ ] Use Docker secrets for sensitive data
- [ ] Limit container resources (memory, CPU)
- [ ] Set up monitoring and alerts
- [ ] Use a reverse proxy (Nginx, Traefik)

### 4. Performance Optimization

```bash
# Optimize Laravel
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache
docker-compose exec app php artisan event:cache

# Install production dependencies only
docker-compose exec app composer install --no-dev --optimize-autoloader
```

## Need Help?

- Check Laravel logs: `docker-compose exec app tail -f storage/logs/laravel.log`
- Check application logs: `docker-compose logs -f app`
- Check database logs: `docker-compose logs -f db`
- Check Nginx logs: `docker-compose exec app tail -f /var/log/nginx/error.log`
