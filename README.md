# IngeneriaDeSoftware_Activos_Fijos
UMG: Proyecto de Ingeneria de Software, Modulo de Activos Fijos

# BackEnd 
## Composer
https://getcomposer.org/


## Laravel
https://laravel.com/docs/9.x/installation#getting-started-on-windows

## Como levantar el proyecto
### Levantar powershell o gitbash, se recomienda utilizar visual studio code
```bash
composer install
cp -r .env.example .env #En caso de algun error, copiar el archivo manualmente
php artisan key:generate
php artisan serve
```

## Creacion de tablas
```bash
php artisan migrate
```

## Actualizacion de tablas
```bash
php artisan migrate:fresh
```

## JWT Key (Para autenticación)
```bash
php artisan jwt:secret
```

# FrontEnd
## Node.js
### Instalar version LTS
https://nodejs.org/es/


## Angular
https://angular.io/start

## Como levantar el proyecto
```bash
npm i
ng serve
```