# Invoice assignment

Small Symfony application for creating invoices with invoice lines.

## Requirements

- PHP 8.x
- Composer
- MySQL 8 or MariaDB

## Setup

```bash
composer install
```

Configure the database URL in `.env` or `.env.local`:

```bash
DATABASE_URL="mysql://USER:PASSWORD@127.0.0.1:3306/invoice?serverVersion=8.0&charset=utf8mb4"
```

Create the database, then run migrations:

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## Run

```bash
php -S 127.0.0.1:8000 -t public
```

Open: http://127.0.0.1:8000/invoice/new

SQL dump: `sql/database.sql`
