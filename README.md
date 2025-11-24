# E-Learning Platform (Laravel + jQuery + Bootstrap)

The architecture mini project built with Laravel, containing features:
- **Course & Lesson Management:** Each course contains multiple lessons stored in separate tables.
- **Enrollment System:** Users can register, enroll, and deregister from courses (AJAX via jQuery).
- **Clean Architecture:** Repository and Service layers separate database and business logic from controllers.
- **Auth System:** Built with Laravel Breeze (register/login/logout).
- **Frontend:** Bootstrap UI with dynamic interactions using jQuery.
- **Database:** SQLite for lightweight local setup.

## Run locally
```bash
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
