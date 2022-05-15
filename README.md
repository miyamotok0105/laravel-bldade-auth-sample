
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

php artisan serve

