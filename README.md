# Descripción

Este app es una prueba sobre un crud de estudiantes.

## Installation

Después de clonar el repositorio, se deben instalar las dependencias

```bash
composer install
```


# Variables de entorno

Es importante configurar la ruta en la variables de entorno: archivo .env así como también los datos de la base de datos

```bash
APP_URL=http://localhost:8000
MIX_BASEURL=http://localhost:8000
```
## Configurar datos de la base de datos
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cursos_test
DB_USERNAME=root
DB_PASSWORD=
```

## Instalar dependencias js

```bash
npm install && npm run dev
```
## Generar key
```php
php artisan key:generate
```

## Correr migraciones

```php
php artisan migrate:fresh --seed
```

## Correr el servidor

```php
php artisan serve
```

usuario por defecto user@example.com clave: password.


## License
[MIT](https://choosealicense.com/licenses/mit/)