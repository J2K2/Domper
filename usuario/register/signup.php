<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs4 sign up page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
 
 <style type="text/css">
    	body{
    margin-top:20px;
    background-color: #f2f3f8;
}
.card {
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e5e9f2;
    border-radius: .2rem;
}
    </style>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="../../index.html">Domper</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto my-2 my-lg-0">
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#about">Sobre Nosotros</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#services">Servicios</a></li>
					<!--<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.html#portfolio">Portafolio</a></li>-->
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#contact">Contáctanos</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../login/login.php">Iniciar Sesion</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="reguser.php">Registrarse</a></li>
				</ul>
			</div>
		</div>
	</nav><br><br><br>
<form method="POST" action="" name="signin-form">
<div class="container h-100">
    		<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Registrate</h1>
							<p class="lead">
									Empieza a usar Domper como un crack.
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form>
										<div class="form-group">
											<label>Nombres</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Pon Tu Nombre">
										</div>
										<div class="form-group">
											<label>Apellidos</label>
											<input class="form-control form-control-lg" type="text" name="company" placeholder="Pon tus Apellidos">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Escribe tu e-mail">
										</div>
										<div class="form-group">
											<label>Contraseña</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Crea una contraseña">
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary"><a href="index.html">Registrarse</a></button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
</form>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>