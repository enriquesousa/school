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
En resources/views/backend/user/add_user.blade.php
```php
@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Agregar Usuario</h4>
                    <h6 class="box-subtitle">Para agregar un usuarios a la <a class="text-warning" href="#">base de datos </a></h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form novalidate="">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">

                                                {{-- Basic Select --}}
                                                <div class="form-group">
                                                    <h5>Rol de Usuario <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="usertype" id="select" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Rol</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                {{-- Basic Text Input --}}
                                                <div class="form-group">
                                                    <h5>Nombre <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <input type="text" name="name" class="form-control" required="">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                {{-- Correo Electrónico --}}
                                                <div class="form-group">
                                                    <h5>Correo Electrónico <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <input type="email" name="email" class="form-control" required="">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                 {{-- Contraseña --}}
                                                 <div class="form-group">
                                                    <h5>Contraseña <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <input type="password" name="password" class="form-control" required="">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Enviar">
                                </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box-body -->

        </section>

    </div>
</div>
<!-- /.content-wrapper -->

@endsection
```
Listo!
## 251. Insert User Data in Database Part 2
Listo!
## 252. Adding Toaster In Project
Para que funcione los mensajes Toaster tenemos que agregar
En resources/views/admin/admin_master.blade.php
```php
<!-- Style-->
...
{{-- Toaster cdn, después de los Style en el header --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

{{-- Y antes que cierre de </body> --}}
 {{-- Toaster cdn --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Toaster script --}}
    <script>
        @if(Session::has('message'))
                var type = "{{ Session::get('alert-type','info') }}"
                    switch(type){
                    case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                    case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                    case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                    case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
                }
            @endif
    </script>

</body>
```

Para mandar un menaje, por ejemplo después de grabar con éxito un registro en 'users' en app/Http/Controllers/Backend/UserController.php:
```php
public function UserStore(Request $request)
{
    $validateData = $request->validate([
        'email' => 'required|unique:users',
        'name' => 'required',
    ]);

    $data = new User();
    $data->usertype = $request->usertype;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = Hash::make($request->password);
    $data->save();

    // aquí va el mensaje de toaster para avisar que ya se grabo a base de datos
    $notification = array(
        'message' => 'Usuario agregado con éxito!',
        'alert-type' => 'success'
    );
    return redirect()->route('user.view')->with($notification);

}
```
Listo!
## 253. Edit and Update User Data into Database Part 1
Listo!
## 254. Edit and Update User Data into Database Part 2

## 255. Delete User Data From Database
## 256. Adding Sweet Alert In Project


