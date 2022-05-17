
[link page](https://medium.com/@GaonLabs/laravel-firebase-authentication-complete-guide-7735a1f83a3d)


composer create-project laravel/laravel:^8.0 example-app
cd example-app


```
mysql -uroot -p
CREATE DATABASE exampleBladaAuthAppV8 DEFAULT CHARACTER SET utf8mb4;
```

.envの修正


```:.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=exampleBladaAuthAppV8
DB_USERNAME=root
DB_PASSWORD=
```


```
php artisan migrate
php artisan migrate:status
```



composer require laravel/ui:^3.4
php artisan ui vue --auth



```
	new file:   app/Http/Controllers/Auth/ConfirmPasswordController.php
	new file:   app/Http/Controllers/Auth/ForgotPasswordController.php
	new file:   app/Http/Controllers/Auth/LoginController.php
	new file:   app/Http/Controllers/Auth/RegisterController.php
	new file:   app/Http/Controllers/Auth/ResetPasswordController.php
	new file:   app/Http/Controllers/Auth/VerificationController.php
	new file:   app/Http/Controllers/HomeController.php
	modified:   composer.json
	modified:   composer.lock
	modified:   database/migrations/2014_10_12_100000_create_password_resets_table.php
	modified:   package.json
	modified:   resources/js/app.js
	modified:   resources/js/bootstrap.js
	new file:   resources/js/components/ExampleComponent.vue
	new file:   resources/sass/_variables.scss
	new file:   resources/sass/app.scss
	new file:   resources/views/auth/login.blade.php
	new file:   resources/views/auth/passwords/confirm.blade.php
	new file:   resources/views/auth/passwords/email.blade.php
	new file:   resources/views/auth/passwords/reset.blade.php
	new file:   resources/views/auth/register.blade.php
	new file:   resources/views/auth/verify.blade.php
	new file:   resources/views/home.blade.php
	new file:   resources/views/layouts/app.blade.php
	modified:   routes/web.php
	modified:   webpack.mix.js
```


php artisan serve




ngrok http http://127.0.0.1:8080
php artisan serve --port=8080

