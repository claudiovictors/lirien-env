# Lirien Env

[![Latest Version](https://img.shields.io/packagist/v/lirien/env.svg?style=flat-square)](https://packagist.org/packages/lirien/env)
[![PHP Version](https://img.shields.io/packagist/php-v/lirien/env.svg?style=flat-square)](https://packagist.org/packages/lirien/env)
[![Total Downloads](https://img.shields.io/packagist/dt/lirien/env.svg?style=flat-square)](https://packagist.org/packages/lirien/env)
[![License](https://img.shields.io/github/license/lirien/env.svg?style=flat-square)](LICENSE)

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

## License
MIT