# Lirien Env

<img src="https://img.shields.io/badge/PHP-8+-777BB4?logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Status-Active-success" />
  <img src="https://img.shields.io/badge/License-MIT-green" />

A minimal and straightforward `.env` file loader for PHP 8.1+.

Ideal for small to medium-sized projects that need simple environment variable loading without additional dependencies.

## Installation

```bash
composer require lirien/env
```

## Usage

```php
use Lirien\Support\Env;

// Load the .env file (typically at application bootstrap)
Env::load(__DIR__ . '/../.env');

// Retrieve a variable
$appName = Env::get('APP_NAME');

// Set a variable at runtime (e.g. in tests)
Env::set('APP_ENV', 'testing');
```

## Example `.env`

```env
APP_NAME=Lirien
APP_ENV=local
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myapp
DB_USERNAME=root
DB_PASSWORD=secret

# Comments and empty lines are ignored
REDIS_HOST=127.0.0.1
```

## Methods

- `Env::load(string $path)` - Loads variables from the specified `.env` file

- `Env::get(string $key): string` - Returns the environment variable value

- `Env::set(string $key, string value): void` - Sets or overrides a variable at runtime

> **Note**: `Env::get()` assumes the variable exists. Use a default value or check existence when needed.

## Security & Best Pratices

- Never commit `.env` (already in `.gitignore`)
- Keep `.env` outside the web root (use absolute path)
- Always validate/cast values returned by `Env::get()`

- `Env::set()`  is not tests only - do not use in prodution

- Use the provided `.env.example` as tamplete

## License
MIT