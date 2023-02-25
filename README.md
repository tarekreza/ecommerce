<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# VENDEX
## Ecommerce website
This Is a Complete Laravel Ecommerce Project, with full admin control panel. where admin can add product and manage orders. This includes Email varification for real buyer. Stripe payment getway and pdf print out.

### Installation
In terminal
```bash
git clone https://github.com/tarekreza/ecommerce.git
cd ecommerce
composer install
```
After this change the name of .env.example file to .env and change these credentials
- DB_DATABASE = (your database name)
- DB_USERNAME=(your database login username)
- DB_PASSWORD=(your database login password)

After that run following command
```
php artisan key:generate
php artisan migrate
```
use ```php artisan serve``` command for run project locally.