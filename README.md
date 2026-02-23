# Ship-Log-Module

Create SaaS Product Ship Log platform

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Ships SaaS Module – Laravel API

A multi-tenant SaaS-based REST API module for managing ships with company-level data isolation.

## Project Overview

This project is built using Laravel 11 and follows clean architecture principles:
Controller (Thin)
Service Layer (Business Logic)
Form Requests (Validation)
API Resources (Response Formatting)
Middleware (Authentication & Isolation)
Company-level Data Isolation

The system ensures that:
A user can only access ships belonging to their own company.

## Architecture Decisions

The project follows a Layered Architecture Pattern:
Controller → Service → Model

## Installation Guide command

git clone Ship-Log-Module
cd project-folder
composer install
php artisan key:generate
php artisan migrate

## Best Practices Used

UUID Primary Keys
Service Layer Pattern
Form Request Validation
API Resources
Thin Controllers
Multi-tenant Data Isolation
Proper HTTP Status Codes
Pagination Support
Clean Code Structure

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
