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
Listo!
## 255. Delete User Data From Database
Listo!
## 256. Adding Sweet Alert In Project
Para soportar el sweetalart2 en resources/views/admin/admin_master.blade.php
```php
...
abajo en los scrips antes del toaster.

{{-- Toaster cdn --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    $(function () {
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: "Estas seguro?",
                text: "Que deseas eliminar este registro?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Eliminarlo!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire("Eliminado!", "El registro fue eliminado.", "success");
                }
            });

        });
    });
    </script>

{{-- Toaster script --}}
```

Y en resources/views/backend/user/view_user.blade.php agregar id=delete al boton
y cop paste el codigo de sweetalart2 que mas nos haya gustado!
```php
...
{{-- Botón Eliminar --}}
<a href="{{ route('user.delete', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a>
...
```
Listo!

# S23 - Manage User Profile
## 257. User Profile Image Upload Edit Update Database Part 1
Listo!
## 258. User Profile Image Upload Edit Update Database Part 2
Listo!
## 259. User Profile Image Upload Edit Update Database Part 3
En resources/views/backend/user/edit_profile.blade.php
Listo!
## 260. User Profile Image Upload Edit Update Database Part 4
Instale Codeium en vez de Tabnine porque es gratis!
Listo!
## 261. User Profile Change password Part 1
Listo!
## 262. User Profile Change password Part 2
Listo!
## 263. Sidebar Menu Active non Active Option
En resources/views/admin/body/sidebar.blade.php
```php
@php
    $prefix = Request::route()->getPrefix();
    $route = Request::route()->getName();
@endphp
...
{{-- Dashboard - Panel de Control --}}
<li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}">
        <i data-feather="pie-chart"></i>
        <span>Panel</span>
    </a>
</li>
...
{{-- Manejar Usuarios --}}
<li class="treeview {{ ($prefix == 'users') ? 'active' : '' }}">
   ...
</li>
...
{{-- Manejar Perfil --}}
<li class="treeview {{ ($prefix == 'profile') ? 'active' : '' }}">
    ...
</li>
```
Listo!
## 264. Add Project in GitHub
```php
# Proceso Manual
## File upload process
- git init
- git add
- git commit -m "first commit"
- git remote add origin git@github.com:enriquesousa/school.git
- git push -u origin master

## From Local Host site Work
- git status
- git add .
- git commit -m "modificaciones"
- git push -u origin master
```
Listo!

# S24 - Student Class Management
## 265. Student Class Management Option Part 1
Listo!
## 266. Student Class Management Option Part 2
Listo!
## 267. Student Class Management Option Part 3
Ya arregle que no me daba el format (input mask) del telefono o celular
lo arregle agregando correctamente en resources/views/admin/admin_master.blade.php
```php
<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>

<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

{{-- para data table --}}
<script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>


{{-- para forms_advance input mask --}}
<script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

<script src="{{ asset('../assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<script src="{{ asset('../assets/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('../assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('../assets/vendor_plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/advanced-form-element.js') }}"></script>

{{-- para data table --}}
<script src="{{asset('backend/js/pages/data-table.js')}}"></script>


<!-- Sunny Admin App -->
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>





{{-- Plugin sweetalert2 para el botón de Delete, cdn en https://sweetalert2.github.io/v10.html --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
$(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Estas seguro?",
            text: "Que deseas eliminar este registro?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminarlo!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Eliminado!", "El registro fue eliminado.", "success");
            }
        });

    });
});
</script>

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

y en resources/views/backend/user/edit_profile.blade.php
```php
{{-- Renglón 2 - Celular y Dirección --}}
<div class="row">

    {{-- Primer Columna --}}
    <div class="col-md-6">

    <!-- Celular -->
    <div class="form-group">
        <label>Celular</label>
        <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-phone"></i>
        </div>
        {{-- <input type="text" name="mobile" id="tel" class="form-control" value="{{ $editData->mobile }}"> --}}
        <input type="text" name="mobile" class="form-control" data-inputmask="'mask':[ '(999) 999-9999']" data-mask="" value="{{ $editData->mobile }}">
        </div>
    </div>

    </div>

    {{-- Segunda Columna --}}
    <div class="col-md-6">

    <!-- Dirección -->
    <div class="form-group">
        <label>Dirección</label>
        <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-address-card" aria-hidden="true"></i>
        </div>
        <input type="text" name="address" class="form-control" value="{{ $editData->address }}">
        </div>
    </div>

    </div>

</div>
```

El botón delete ya quedo 
listo!

# S25 - Student Year Management
## 268. Student Year Management Option Part 1
CRUD - Tabla 'student_years'
View (List), Add and Edit Student Year
Listo! 
## 269. Student Year Management Option Part 2
CRUD - Tabla 'student_years'
Update and Delete - Student Year
Listo! 

# S26 - Student Group Management
## 270. Student Group Management Option Part 1
Group
View, Add, Edit
Listo!
## 271. Student Group Management Option Part 2
Group
Update, Delete
Listo!

# S27 - Student Shift Management
## 272. Student Shift Management Option Part 1
Shift - Tabla 'student_shifts'
View, Add, Edit
Listo!
## 273. Student Shift Management Option Part 2
Shift - Tabla 'student_shifts'
Update, Delete
Listo!

# S28 - Student Fee Category Option
## 274. Working Fee Category Option Part 1
FeeCategory - Tabla 'fee_categories'
View, Add
Listo!
## 275. Working Fee Category Option Part 2
FeeCategory - Tabla 'fee_categories'
Edit, Update, Delete
Listo!

# S29 - Manage Student Fee Category Amount
## 276. Manage Fee Category Amount Part 1
Listo!
## 277. Manage Fee Category Amount Part 2
Listo!
## 278. Manage Fee Category Amount Part 3
Listo!
## 279. Manage Fee Category Amount Part 4
Listo!
## 280. Manage Fee Category Amount Part 5
relación con el 'id' de la tabla 'fee_categories
En app/Models/FeeCategoryAmount.php
```php
// relación con el 'id' de la tabla 'fee_categories'
public function fee_category() {
    return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
}
```
Listo!
## 281. Manage Fee Category Amount Part 6
resources/views/backend/setup/fee_amount/edit_fee_amount.blade.php
Listo!
## 282. Manage Fee Category Amount Part 7
Update
Listo!
## 283. Manage Fee Category Amount Part 8
Ver Detalles de la Categoría de Cobro
Listo!

# S30 - Manage Student Exam Type
## 284. Working Exam Type Part 1
Agregar nuevo CRUD para tabla 'exam_types'
View, Add, Store
Listo!
## 285. Working Exam Type Part 2
Edit, Update, y Delete
Listo!

# S31 - Manage Student Subjects
## 286. Working Subjects Part 1
Agregar nuevo CRUD para tabla 'school_subjects'
View, Add, Store
Listo!
## 287. Working Subjects Part 2
Edit, Update, y Delete
Listo!

# S32 - Manage Student Assign Subject
## 288. Student Assign Subjects Part 1
Crear nueva tabla 'assign_subjects' con su controlador y modelo
Controlador: AssignSubjectController
Modelo: AssignSubject
Crear la Vista: resources/views/backend/setup/assign_subject/view_assign_subject.blade.php
Listo!
## 289. Student Assign Subjects Part 2
Crear la Vista: resources/views/backend/setup/assign_subject/add_assign_subject.blade.php
Listo!
## 290. Student Assign Subjects Part 3
Relación con el 'id' de la tabla 'student_classes'
En app/Models/AssignSubject.php
```php
// relación con el 'id' de la tabla 'student_classes'
public function student_class() {
    return $this->belongsTo(StudentClass::class, 'class_id', 'id');
}
```

Agrupamos por Clase.
En app/Http/Controllers/Backend/Setup/AssignSubjectController.php
```php
public function AssignSubjectView(){
    // $data['allData'] = AssignSubject::all();
    $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
    return view('backend.setup.assign_subject.view_assign_subject', $data);
}
```

Y desplegamos en la vista: resources/views/backend/setup/assign_subject/view_assign_subject.blade.php
```php
<td> {{ $item->student_class->name }}</td>
```
Listo!
## 291. Student Assign Subjects Part 4
Update
Listo!
## 292. Student Assign Subjects Part 5
Detalles
Listo!

# S33 - Manage Designation
## 293. Working Designation Part 1
Crear nueva tabla 'designations' con su controlador y modelo

Controlador: DesignationController
Modelo: Designation

Crear Vistas:
- resources/views/backend/setup/designation/view_designation.blade.php
- resources/views/backend/setup/designation/add_designation.blade.php

Métodos Creados en app/Http/Controllers/Backend/Setup/DesignationController.php:
- DesignationView
- DesignationAdd
- DesignationStore

Listo!
## 294. Working Designation Part 2
Edit, Update y Delete
Listo!

# S34 - Student Registration Management
## 295. Student Registration Part 1
nuevo menu en resources/views/admin/body/sidebar.blade.php
```php
<li><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Registro de Estudiantes</a></li>
```

nuevos campos en tabla database/migrations/2014_10_12_000000_create_users_table.php
```php
Schema::create('users', function (Blueprint $table) {
    $table->id();

    $table->string('usertype')->nullable()->comment('Student or Admin or Employee');
    $table->string('name')->nullable();
    $table->string('email')->unique()->nullable();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');

    $table->string('mobile')->nullable();
    $table->string('address')->nullable();
    $table->string('gender')->nullable();
    $table->string('image')->nullable();
    $table->string('fname')->nullable()->comment('Father Name');
    $table->string('mname')->nullable()->comment('Mother Name');
    $table->string('religion')->nullable()->comment('Religion');
    $table->string('id_no')->nullable()->comment('ID number');
    $table->date('dob')->nullable()->comment('Date of Birth');
    $table->string('code')->nullable()->comment('Para generar user password');
    $table->string('role')->nullable()->comment('admin: head of software, operator: computer operator, user: employee');
    $table->date('join_date')->nullable();
    $table->integer('designation_id')->nullable();
    $table->double('salary')->nullable();
    $table->boolean('status')->default(1)->comment('0: Inactive, 1: Active');

    $table->rememberToken();
    $table->foreignId('current_team_id')->nullable();
    $table->string('profile_photo_path', 2048)->nullable();

    $table->timestamps();
});
```
Listo!
## 296. Student Registration Part 2
Crear nuevo modelo: AssignStudent con su migration
En database/migrations/2023_08_03_153241_create_assign_students_table.php:
```php
Schema::create('assign_students', function (Blueprint $table) {
    $table->id();

    $table->integer('student_id')->comment('user_id=student_id');
    $table->integer('roll')->nullable();
    $table->integer('class_id');
    $table->integer('year_id');
    $table->integer('group_id')->nullable();
    $table->integer('shift_id')->nullable();

    $table->timestamps();
});
```

En database/migrations/2023_08_03_153916_create_discount_students_table.php
```php
Schema::create('discount_students', function (Blueprint $table) {
    $table->id();

    $table->integer('assign_student_id');
    $table->integer('fee_category_id')->nullable();
    $table->double('discount')->nullable();

    $table->timestamps();
});
```
Listo!
## 297. Student Registration Part 3
Listo!
## 298. Student Registration Part 4
Listo!
## 299. Student Registration Part 5
Listo!
## 300. Student Registration Part 6
Listo!
## 301. Student Registration Part 7
Listo!
## 302. Student Registration Part 8
Listo!
## 303. Student Registration Part 9
Listo!
## 304. Student Registration Part 10
Listo!
## 305. Student Registration Part 11
Listo!
## 306. Student Registration Part 12
Listo!
## 307. Student Registration Part 13
Listo!
## 308. Student Registration Edit Part 1
Add
Listo!
## 309. Student Registration Edit Part 2
Edit
Listo!
## 310. Student Registration Edit Part 3
Update
Listo!
## 311. Student Promotion Option
Listo!

# S35 - Student PDF Generate
## 312. Student PDF Generate Part 1
Instalar niklas laravel pdf
https://github.com/niklasravnsborg/laravel-pdf
```php
composer require niklasravnsborg/laravel-pdf
```
To start using Laravel, add the Service Provider and the Facade to your config/app.php:
```php
'providers' => [
	// ...
	niklasravnsborg\LaravelPdf\PdfServiceProvider::class
]

'aliases' => [
	// ...
	'PDF' => niklasravnsborg\LaravelPdf\Facades\Pdf::class
]
```
Para probar que todos los archivos se hayan instalado correctamente:
```php
composer dump-autoload
```
Luego limpiar caché:
```php
php artisan config:cache
php artisan cache:clear
php artisan view:clear
```
Listo! 
## 313. Student PDF Generate Part 2
Buscar en google 'html table border style' html para crear PDF:
https://www.w3schools.com/Css/css_table.asp

niklasravnsborg/laravel-pdf 
Array and string offset access syntax with curly braces is no longer supported

Desinstalar paquete niklasravnsborg/laravel-pdf 
```php
composer remove niklasravnsborg/laravel-pdf
```

Voy a usar otro paquete:
Creating PDFs in Laravel 9: A Step-by-Step Guide using DomPDF
https://towardsdev.com/creating-pdf-files-in-laravel-9-a-step-by-step-guide-using-dompdf-4b7a7095d04b

```php
composer require barryvdh/laravel-dompdf
```

Configure DomPDF Package in Laravel
Once the package is installed, you need to register the service provider in the config/app.php file. 
You can do this by adding the following line to the providers array:
```php
'providers' => [
    // ...
    Barryvdh\DomPDF\ServiceProvider::class,
],
```
Next, we’ll add an alias for the package to the aliases array in the same file:
```php
'aliases' => [
    // ...
    'PDF' => Barryvdh\DomPDF\Facade::class,
],
```

En app/Http/Controllers/Backend/Student/StudentRegController.php
```php
use Barryvdh\DomPDF\Facade\Pdf;
...
public function StudentRegistrationDetails($student_id){
    $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();

    $pdf = PDF::loadView('backend.student.student_registration.student_details_pdf', $data);
    return $pdf->download('detalles.pdf');
}
```
Listo!

# S36 - Student PDF Generate
## 314. Student Roll Generate Part 1
Listo!
## 315. Student Roll Generate Part 2
Listo!
## 316. Student Roll Generate Part 3
Como pasar los datos con JS a /reg/getstudents
Listo!
## 317. Student Roll Generate Part 4
Para update el roll del estudiante
En app/Http/Controllers/Backend/Student/StudentRollController.php
```php
public function StudentRollStore(Request $request){

    $year_id = $request->year_id;
    $class_id = $request->class_id;

    if ($request->student_id != null) {
        for ($i=0; $i < count($request->student_id); $i++) {
            AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll'=>$request->roll[$i]]);
        }
    } else {
        // Desplegar notificación
        $notification = array(
            'message' => 'No se encuentra estudiante',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    // Desplegar notificación
    $notification = array(
        'message' => 'Rol Actualizado con éxito!',
        'alert-type' => 'success'
    );
    return redirect()->route('roll.generate.view')->with($notification);
}
```
Listo!

# S37 - Student Registration Fee
## 318. Student Registration Fee Part 1
Vamos ahora a manejar la tabla JS con la ayuda de:
https://handlebarsjs.com/

En resources/views/backend/student/registration_fee/registration_fee_view.blade.php
```php
...
{{-- Tabla con JS de Roles generados para la Búsqueda, d-none: clase para que no se despliegue el div  --}}
<div class="row">
    <div class="col-md-12">

        {{-- Ahora vamos a usar handlebarsjs para desplegar la tabla --}}
        <div class="DocumentResults">
            <script id="document-template" type="text/x-handlebars-template">
                <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            @{{{thsource}}}
                        </tr>
                    </thead>
                    <tbody>
                        @{{#each this}}
                        <tr>
                            @{{{tdsource}}}
                        </tr>
                        @{{/each}}
                    </tbody>
                </table>
            </script>
        </div>

    </div>
</div>
...
```
Listo!
## 319. Student Registration Fee Part 2
Usar la version cdn de handlebars
https://cdnjs.com/libraries/handlebars.js

En resources/views/backend/student/registration_fee/registration_fee_view.blade.php
```php
{{-- para soportar handlebars --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js"></script>
...
```
Listo!
## 320. Student Registration Fee Part 3
Listo!
## 321. Student Registration Fee Part 4



# S38 - Student Monthly Fee Option
## 322. Student Monthly Fee Part 1
## 323. Student Monthly Fee Part 2

# S39 - Student Exam Fee Option
## 324. Student Exam Fee Part 1
## 325. Student Exam Fee Part 2
## 326. update Route authentication

# S40 - Manage Employee Registration
## 327. Employee Registration Part 1
## 328. Employee Registration Part 2
## 329. Employee Registration Part 3
## 330. Employee Registration Part 4
## 331. Employee Registration Part 5
## 332. Employee Registration Part 6
## 333. Employee Registration Part 7

# S41 - Manage Employee Salary Increment
## 334. Employee Salary Increment and Details Part 1
## 335. Employee Salary Increment and Details Part 2
## 336. Employee Salary Increment and Details Part 3
## 337. Employee Salary Increment and Details Part 4

# S42 - Manage Employee Leave Management
## 338. Employee Leave Management Part 1
## 339. Employee Leave Management Part 2
## 340. Employee Leave Management Part 3
## 341. Employee Leave Management Part 4
## 342. Employee Leave Management Part 5
## 343. Employee Leave Management Part 6

# S43 - Employee Attendance Management
## 344. Employee Attendance Part 1
## 345. Employee Attendance Part 2
## 346. Employee Attendance Part 3
## 347. Employee Attendance Part 4
## 348. Employee Attendance Part 5
## 349. Employee Attendance Part 6
## 350. Employee Attendance Part 7

# S44 - Employee Monthly Salary Management
## 351. Employee Monthly Salary Part 1
## 352. Employee Monthly Salary Part 2
## 353. Employee Monthly Salary Part 3

# S45 - Manage Student Marks Entry
## 354. Student Marks Entry Part 1
## 355. Student Marks Entry Part 2
## 356. Student Marks Entry Part 3
## 357. Student Marks Entry Part 4
## 358. Student Marks Entry Part 5
## 359. Student Marks Edit Part 1
## 360. Student Marks Edit Part 2
## 361. Update Route Active Menu

# S46 - Manage Student Grade Point
## 362. Student Grade Point Part 1
## 363. Student Grade Point Part 2
## 364. Student Grade Point Part 3

# S47 - Manage Student Fee
## 365. Students Fee Part 1
## 366. Students Fee Part 2
## 367. Students Fee Part 3
## 368. Students Fee Part 4
## 369. Students Fee Part 5

# S48 - Manage Employees Salary
## 370. Employees Salary Part 1
## 371. Employees Salary Part 2
## 372. Employees Salary Part 3
## 373. Employees Salary Part 4
## 374. Error Solve for Student Fee and Employee Salary

# S49 - Manage Others Cost
## 375. Others Cost Part 1
## 376. Others Cost Part 2
## 377. Others Cost Part 3
## 378. Others Cost Part 4

# S50 - Manage Monthly and Yearly Profit
## 379. Monthly and Yearly Profit Part 1
## 380. Monthly and Yearly Profit Part 2
## 381. Monthly and Yearly Profit Part 3
## 382. Monthly and Yearly Profit Part 4

# S51 - Manage Student Mark Sheet Generate
## 383. Student Mark Sheet Generate Part 1
## 384. Student Mark Sheet Generate Part 2
## 385. Student Mark Sheet Generate Part 3
## 386. Student Mark Sheet Generate Part 4
## 387. Student Mark Sheet Generate Part 5
## 388. Student Mark Sheet Generate Part 6

# S52 - Employee Attendance Report
## 389. Employee Attendance Report Part 1
## 390. Employee Attendance Report Part 2
## 391. Employee Attendance Report Part 3

# S53 - Manage Students Result
## 392. Students Result Part 1
## 393. Students Result Part 2
## 394. Students Result Part 3

# S54 - Manage Students ID Card Generate
## 395. Students ID Card Generate Part 1
## 396. Students ID Card Generate Part 2
## 397. Students ID Card Generate Part 3

# S55 - Updated Videos - Student Demand
## 398. Prevent Browser Back Button After Logout
## 399. How to Run Project Localhost from Source Code
## 400. Happy Learning
## 401. What is coming next?
































