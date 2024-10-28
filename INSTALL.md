# How to Install
<p>Follow this step to Install the website</p>

```bash
composer install
```

```bash
php artisan key:generate
```

<p>Rename ".env.example" file to ".env". after that configure variable for :</p>

```bash
APP_NAME="ARSIP SURAT"

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_simsurat # Your DB Name
DB_USERNAME=root
DB_PASSWORD=

HASH_ID_SALT="S4ltF0rH4sh1d5"
HASHIDS_LENGTH=16

```

<p>After that, continue run :</p>

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

```bash
php artisan serve
```
