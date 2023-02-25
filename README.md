<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# VENDEX
## Ecommerce website
This Is a Complete Laravel Ecommerce Project, with full admin control panel. where admin can add product and manage orders. This includes Email varification for real buyer. Stripe payment getway and pdf print out.

## Screenshot

### Homepage
![Vendex-Everything-You-Need](https://user-images.githubusercontent.com/83882275/221375003-d96b0b79-f644-4349-8642-15f1bbd54b6e.png)

### Product page
![product](https://user-images.githubusercontent.com/83882275/221375061-169d9dcb-e005-462e-870c-522653d5e502.png)

### Admin dashboard
![Dashboard](https://user-images.githubusercontent.com/83882275/221375080-b4aeb2b3-5d4d-43a1-b8e5-02a56e9a0a69.png)

### Admin product manage page
![All-product](https://user-images.githubusercontent.com/83882275/221375108-70cc613e-f16c-4caf-935f-5d4c76f896e4.png)



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
