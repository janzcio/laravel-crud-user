# EXAM Freelance Developer Test

Laravel CRUD for users

# SETUP GUIDE

### Clone the project

```bash
https - https://github.com/janzcio/laravel-crud-user.git
ssh - git@github.com:janzcio/laravel-crud-user.git
```

check out the project

```bash
cd laravel-crud-user
```

Install or download PHP version

```bash
Php version should be php >= 8.3 above
```

Run composer
```bash
composer install
```

### Connection guide

Config your connection or create `.env` file.

```bash
cp .env.example .env
php artisan key:generate
```

Create a `database` file the same database name value in your `.env` file property named `DB_DATABASE` for your connection. It is not necessary but for the project run requires a database connection.


Run migration
```bash
php artisan migrate
```

Run seeder for your default login credential
```bash
php artisan db:seed
```

### Run the project

```bash
php artisan serve
```

login route
```bash
http://127.0.0.1:8000/login
```

Defaut login credential
```bash
email:admin@admin.com
password:admin
```

users route
```bash
http://127.0.0.1:8000/users
```

