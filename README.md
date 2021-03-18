<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Demo

Student Account : 
email: test@test.com 
password: password

Admin Account :
email: admin@admin.com 
password: password

<hr>

<a href="http://secret-ocean-04762.herokuapp.com/">View Webiste</a> <br>
<a href="http://secret-ocean-04762.herokuapp.com/admin">Admin Side</a>

# Functionality

-   Login and Registration
-   Forge Password
-   Booking
-   Tacking
-   Admin Panel
-   Student Panel

# Install Steps:

```bash
composer install
cp .env.example .env
php artisan migrate
php artisan key:generate
php artisan storage:link
php artisan serve
```
