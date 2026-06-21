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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# 🛒 Mi Tienda Tecsup - Pasarela de Pagos Seguros (Stripe & Telegram)

¡Hola! Este es el repositorio de mi proyecto para el laboratorio de desarrollo de software en Tecsup. He construido esta plataforma de comercio electrónico desde cero utilizando **Laravel**, enfocándome en la simulación de compras de componentes tecnológicos y hardware de IoT (como Kits de desarrollo ESP32, Arduinos, Sensores de temperatura, etc.).

En este proyecto configuré e integré con éxito dos APIs externas de manera profesional:
1. **Stripe API (Modo Prueba):** Para procesar pagos simulados con tarjetas de crédito directamente desde el formulario de la tienda.
2. **Telegram Bot API:** Para recibir notificaciones automáticas y alertas en un grupo administrativo cada vez que un cliente realiza un pago de forma exitosa.

Además, añadí un **Selector Rápido de Tarjetas** con JavaScript justo arriba del diseño de la tarjeta azul. Con esto puedo simular al instante tanto los pagos exitosos como los errores (tarjetas rechazadas) solicitados en la guía del laboratorio sin tener que escribir los números de prueba a mano.

---

## 🛠️ Requisitos del Entorno

Para poder desarrollar y ejecutar este proyecto, instalé en mi entorno local:
- PHP >= 8.1
- Composer (Gestor de dependencias de PHP)
- MySQL (Base de datos)
- Node.js & NPM (Para compilar los estilos)

---

## 🚀 Cómo Estructuré e Instalé mi Proyecto (Desde Cero)

Estos fueron los pasos exactos que seguí en mi terminal para dar vida al proyecto y configurar la estructura base:

### 1. Creación del proyecto e instalación de herramientas
Primero, creé el proyecto base de Laravel con Composer e instalé las librerías necesarias para el backend:
```bash
laravel new tienda-tecsup
cd tienda-tecsup
composer install