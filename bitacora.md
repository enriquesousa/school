# School Management System
## Fecha: Miércoles 28 de Junio 2023
Estoy en Laravel 10
- nginx
- mysql: school
- valet

# S21 - School Management System 
## 242. Customize Admin Dashboard
Listo!
## 243. Dashboard Page Segmentation
Listo!
## 244. User Logout Option
Listo!
## 245. Customize Login Form
También customize en register en resources/views/auth/register.blade.php
Listo!
## 246. Refresh Admin Template
Listo!

# S22 - Manage User
## 247. Routing Controller and Manage Users Part 1
Listo!
## 248. Routing Controller and Manage Users Part 2
Listo!
## 249. View User Data from Database
para borrar tabla y volver a migrarla, primero ponerle un 2 en la columna 'batch' a la tabla 'migrations' a la migración de user_table.

Después hacer los cambios a la tabla en database/migrations/2014_10_12_000000_create_users_table.php
En este caso agregamos un campo de 'usertype'.
```php
Schema::create('users', function (Blueprint $table) {
    $table->id();

    $table->string('name')->nullable();
    $table->string('usertype')->nullable();
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->foreignId('current_team_id')->nullable();
    $table->string('profile_photo_path', 2048)->nullable();

    $table->timestamps();
});
```

Luego hacer el rollback para que elimine solo esa tabla de user_table con:
```php
php artisan migrate:rollback
```

Por ultimo hacer la migración con:
```php
php artisan migrate
```

Listo!
## 250. Insert User Data in Database Part 1

## 251. Insert User Data in Database Part 2
## 252. Adding Toastr In Project
## 253. Edit and Update User Data into Database Part 1
## 254. Edit and Update User Data into Database Part 2
## 255. Delete User Data From Database
## 256. Adding Sweet Alert In Project


