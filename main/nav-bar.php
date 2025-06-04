<!-- nav-bar.php -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="index.php">IXMUCARE</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
			aria-controls="ftco-nav" aria-expanded="false" aria-label="Alternar navegación">
			<span class="oi oi-menu"></span> Menú
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<!-- <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li> -->

				<?php if (!isset($_SESSION['isLoggedIn'])) { ?>

					<li class="nav-item"><a href="register.php" class="nav-link">Registrarse</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">Iniciar Sesión</a></li>

				<?php } elseif (isset($_SESSION['isLoggedIn']) && $_SESSION['user_role'] === 'user') { ?>

					<li class="nav-item">
						<a href="profile.php" class="nav-link">
						<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Usuario'; ?>
							<i class="fa fa-user"></i>
						</a>
					</li>

					<!-- <li class="nav-item">
						<a href="message.php" class="nav-link">
							<i class="fa fa-envelope"></i> 
						</a>
					</li> -->

					<li class="nav-item">
						<a href="my-tbl-res.php" class="nav-link">
							<i class="fa fa-calendar-plus-o"></i> <!-- Mis Reservaciones -->
						</a>
					</li>

					<!-- <li class="nav-item">
						<a href="my-food-order.php" class="nav-link">
							<i class="fa fa-first-order"></i>
						</a>
					</li> -->

					<li class="nav-item">
						<a href="logout.php" class="nav-link">
							<i class="fa fa-power-off"></i> <!-- Cerrar Sesión -->
						</a>
					</li>

				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
