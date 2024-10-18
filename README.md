<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Instalaciones

InstAlacion de laravel UI
- Instalacion de una interfas grafica de boostrap
- **composer require laravel/ui**
- **php artisan ui bootstrap --auth** actulizamos el contralodar
- **nmp run dev** se ejecutaran las actulizaciones

Instalacion de [AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Installation)
-Instale los recursos del paquete necesarios utilizando el siguiente comando:
- **composer require jeroennoten/laravel-adminlte**

- Instalar el andamiaje de autenticación heredado (opcional)
- **composer require laravel/ui**
- **php artisan ui bootstrap --auth**
- Luego, puedes realizar los reemplazos de vista ejecutando el siguiente comando artesanal:
- **php artisan adminlte:install --only=auth_views**

The World es un paquete de Laravel que proporciona una lista de países, estados, ciudades, zonas horarias, monedas e idiomas.
Se puede consumir con World Facade o las rutas API definidas.

Pagina donde se encueentra el paquete de instalacion [ GitHub World](https://github.com/nnjeim/world).
- **composer require nnjeim/world**
- **php artisan world:install**
- **php artisan db:seed --class=WorldSeeder**


Requerir el instalador de Laravel globalmente usando Composer:

- **composer global require laravel/installer**

Asegúrese de colocar el directorio bin del proveedor en su PATH. A continuación, se muestra cómo puede hacerlo según cada sistema operativo:

macOS:export PATH="$PATH:$HOME/.composer/vendor/bin"
Ventanas:set PATH=%PATH%;%USERPROFILE%\AppData\Roaming\Composer\vendor\bin
Linux:export PATH="~/.config/composer/vendor/bin:$PATH"
Crea un nuevo proyecto usando la CLI de Laravel:

Instalar Tailwind CSS y Flowbite usando NPM [Tailwind CSS y Flowbite](https://flowbite.com/docs/getting-started/laravel/):
- **npm install -D tailwindcss postcss autoprefixer flowbite**

Cree un archivo de configuración CSS de Tailwind:
- **npx tailwindcss init -p**

Para mas detalle consultar documentación
