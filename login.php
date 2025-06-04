

<?php
if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  include 'dbCon.php';
  $con = connect();

  function encryptPassword($password, $key)
  {
    $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($password, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    return base64_encode($iv . $hmac . $ciphertext_raw);
  }

  function decryptPassword($encryptedPassword, $key)
  {
    $c = base64_decode($encryptedPassword);
    $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    if (hash_equals($hmac, $calcmac)) {
      return $original_plaintext;
    }
    return false;
  }
  $encryptionKey = "YourSecretKeyHere";

  // Fetch user with the provided email
  $emailSQL = "SELECT * FROM users WHERE email = '$email';";
  $emailResult = $con->query($emailSQL);

  if ($emailResult->num_rows <= 0) {
    echo '<script>alert("Este correo electrónico no existe.")</script>';
    echo '<script>window.location="login.php"</script>';
  } else {
    $user = $emailResult->fetch_assoc();

    // Check if the role is "user" first
    if ($user['role'] !== 'user') {
      echo '<script>alert("Acceso denegado. No tienes permiso para iniciar sesión.")</script>';
      echo '<script>window.location="login.php";</script>';
      exit(); // Ensure no further code runs
    }

    // Decrypt the stored password and compare
    $decryptedPassword = decryptPassword($user['password'], $encryptionKey);

    // Verify password
    // Verificar la contraseña
    if ($decryptedPassword === false || $password !== $decryptedPassword) {
      echo '<script>alert("Esta contraseña es incorrecta.")</script>';
      echo '<script>window.location="login.php"</script>';
    } else {
      // Verificar el estado del usuario
      if ($user['status'] == 0) {
        echo '<script>alert("Tu cuenta no ha sido activada por el administrador.")</script>';
        echo '<script>window.location="login.php"</script>';
      } elseif ($user['status'] == 9) {
        echo '<script>alert("Tu cuenta ha sido desactivada por el administrador.")</script>';
        echo '<script>window.location="login.php"</script>';
      } else {
        // Inicio de sesión exitoso para el rol 'usuario'
        session_start(); // Asegurar que la sesión esté iniciada

        $_SESSION['isLoggedIn'] = TRUE;
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['role'] = $user['user'];
        $_SESSION['user_role'] = 'user';
        $_SESSION['address'] = $user['address'];
        $_SESSION['gender'] = $user['gender'];

        // Mensaje de éxito y redirección
        echo '<script>alert("¡Inicio de sesión exitoso!"); window.location="table-reservation.php";</script>';
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ixmucare - Un lugar mágico</title>
    <link rel="stylesheet" href="styles/login.css">
    <script src="scripts/contraseña.js"></script>
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

    <section class="login-section">
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
    
                <!-- Correo -->
                <div class="input-box">
                    <span class="icon">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" name="email" required>
                    <label>Correo Electrónico</label>
                </div>
    
                <!-- Contraseña -->
                <div class="input-box">
                    <span class="icon">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password"  name="password" required>
                    <label>Contraseña</label>
                    <span class="toggle-password" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <!-- Enlace "¿Olvidaste tu contraseña?" -->
                <!-- <div class="forgot-password-link">
                    <p><a href="/ixmucare/pages/forgot-password.php">¿Olvidaste tu contraseña?</a></p>
                </div> -->
    
                <!-- Botón de inicio de sesión -->
                <button type="submit" name="login" class="btn">Iniciar Sesión</button>

                <!-- Leyenda -->
                <div class="register-link">
                    <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
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
