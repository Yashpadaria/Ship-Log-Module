# Ship-Log-Module

Create SaaS Product Ship Log platform

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Shipslog Mini Module

## Architecture
- Controller: Thin, delegates to Service
- Service: Business logic, company isolation
- Requests: Validation
- Resources: API formatting

## Folder Structure
- app/Http/Controllers/Api
- app/Services
- app/Http/Requests
- app/Http/Resources
- app/Models

## Company-level Isolation
- All ship queries are scoped by the authenticated user's company_id (see ShipService).
- Authentication is simulated via FakeAuthMiddleware.

## Database
- Companies, Users, Ships tables
- Foreign keys and soft deletes

## Install & Run
composer install
cp [.env.example](http://_vscodecontentref_/4) .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
