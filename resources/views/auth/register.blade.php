<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>SAE - Registro </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">	

</head>

<body class="hold-transition theme-primary bg-gradient-primary">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
                            <h2 class="text-white">Forma de Registro</h2>
							<p class="text-white-50 text-warning">SAE</p>
                            <p class="text-white-50">Sistema de Administración de Escuelas</p>					
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- Nombre Completo --}}
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
										</div>
										<input type="text" name="name" id="name" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Entre Nombre Completo">
									</div>
								</div>

                                {{-- Correo Electrónico --}}
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
										</div>
										<input type="email" name="email" id="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Entre Correo Electrónico">
									</div>
								</div>

                                {{-- Contraseña --}}
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input type="password" name="password" id="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Entre Contraseña">
									</div>
								</div>

                                {{-- Confirmar Contraseña --}}
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Confirmar Contraseña">
									</div>
								</div>

                                {{-- Acepto los términos CheckBox y Botón Registrarse --}}
                                <div class="row">

                                    {{-- Acepto los términos CheckBox --}}
                                    <div class="col-12">
                                        <div class="checkbox text-white">
                                        <input type="checkbox" id="basic_checkbox_1" >
                                        <label for="basic_checkbox_1">Acepto los <a href="#" class="text-warning"><b>términos</b></a></label>
                                        </div>
                                    </div>

                                    {{-- Registrarse --}}
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-info btn-rounded margin-top-10">Registrarse</button>
                                    </div>

                                </div>

							</form>													

							<div class="text-center text-white">
							  <p class="mt-20">- Registrarte con -</p>
							  <p class="gap-items-2 mb-20">
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
								</p>	
							</div>

							<div class="text-center">
                                <p class="mt-15 mb-0 text-white">Aun no tienes cuenta? <a href="{{ route('register') }}" class="text-danger ml-5">Crear Cuenta</a></p>
							</div>

						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
	
	
</body>
</html>
