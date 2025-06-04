<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ixmucare - Un lugar mágico</title>
    <link rel="stylesheet" href="styles/registro.css">
    <script src="scripts/.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- MENÚ DE NAVEGACIÓN -->
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/icons/logo-ixmucare.png" alt="Logo Ixmucare">
            </a>        
        </div>
        <nav>
            <ul>
                <!-- <li><a href="index.php" class="select-btn" >Inicio</a></li> -->
                <li><a href="menu.php">Menú</a></li>
                <li><a href="login.php">Reservaciones</a></li>
                <li><a href="gallery.php">Galería</a></li>
                <li><a href="contact.php">Contacto</a></li>
                <li><a href="about-us.php">Acerca De</a></li>
                <!-- <li><a href="http://localhost/ixmucare-admin/login.php" class="login-btn">Iniciar Sesión</a></li> -->
            </ul>
        </nav>
    </header>
<section class="register-section">
    <div class="register-container">
        <h2>Registro</h2>
       <form action="manage-insert.php" method="POST" enctype="multipart/form-data" onsubmit="return validatePasswords();">
    <!-- Nombre (username) -->
    <div class="input-box">
        <span class="icon"><i class="fas fa-user"></i></span>
        <input type="text" name="username" required>
        <label>Ingresa tu nombre</label>
    </div>

    <!-- Correo (email) -->
    <div class="input-box">
        <span class="icon"><i class="fas fa-envelope"></i></span>
        <input type="email" name="email" required>
        <label>Ingresa tu correo electrónico</label>
    </div>

    <!-- Teléfono (phone) -->
    <div class="input-box">
        <span class="icon"><i class="fas fa-phone"></i></span>
        <input type="tel" name="phone" pattern="[0-9]{10}" required>
        <label>Ingresa tu número de teléfono</label>
    </div>

    <!-- Dirección (address) -->
    <div class="input-box">
        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
        <input type="text" name="address" required>
        <label>Ingresa tu dirección</label>
    </div>

    <!-- Género (gender) -->
    <div class="input-box">
        <span class="icon"><i class="fas fa-venus-mars"></i></span>
        <select name="gender" required>
            <option value="" disabled selected>Selecciona tu género</option>
            <option value="Male">Hombre</option>
            <option value="Female">Mujer</option>
            <option value="Other">Otro</option>
        </select>
    </div>

    <!-- Contraseña (password) -->
    <div class="input-box">
        <span class="icon"><i class="fas fa-lock"></i></span>
        <input type="password" name="password" id="password" required>
        <label>Crea una contraseña</label>
        <span class="toggle-password" onclick="togglePassword('password')">
            <i class="fas fa-eye"></i>
        </span>
    </div>

    <!-- Confirmar contraseña -->
    <div class="input-box">
        <span class="icon"><i class="fas fa-lock"></i></span>
        <input type="password" id="confirmPassword" required>
        <label>Confirma tu contraseña</label>
        <span class="toggle-password" onclick="togglePassword('confirmPassword')">
            <i class="fas fa-eye"></i>
        </span>
    </div>

    <!-- Botón de registro -->
    <button type="submit" name="regUser" class="btn">Registrarse</button>

    <!-- Leyenda -->
    <div class="login-link">
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</form>

    </div>
</section>


    <!-- Pie de página -->
    <footer>
        <p>Ejido Chiltepec Secc. Tanques, Calle IxmuCare S/N Paraiso Tabasco</p>
        <div class="contact-social">
            <!-- <p>(512) 554-1515</p> -->
            <div class="social-media">
                <a href="#facebook"><img src="assets/images/icons/facebook.png" alt="Facebook"></a>
                <a href="#twitter"><img src="assets/images/icons/instagram.png" alt="Twitter"></a>
                <a href="#whatsapp"><img src="assets/images/icons/whatsapp.png" alt="Whatsapp"></a>
            </div>
        </div>
    </footer>
</body>
</html>

