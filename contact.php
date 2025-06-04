<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ixmucare - Un lugar mágico</title>
    <link rel="stylesheet" href="styles/contacto.css">
    <script src="scripts/main.js"></script>
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
    
     <!-- SECCIÓN DE CONTACTO -->
     <section id="contacto">
        <div class="container">
            <h2 class="text-center">Contacto</h2>
            <p class="intro text-center">Estamos aquí para ayudarte. ¡Contáctanos o visítanos!</p>

            <!-- Información y mapa -->
            <div class="row align-items-start">
                <div class="col-md-6">
                    <div class="info-contacto bg-white p-3 rounded shadow-sm">
                        <h3>Información de Contacto</h3>
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Dirección:</strong><br>
                            Ejido Chiltepec Secc. Tanques,<br>
                            Calle IxmuCare S/N,<br>
                            Paraíso, Tabasco.</p>
                        <p><i class="fas fa-phone-alt"></i> <strong>Teléfono:</strong> (512) 554-1515</p>
                        <p><i class="fas fa-envelope"></i> <strong>Correo:</strong> contacto@ixmucare.com</p>
                        <p><i class="fas fa-phone-alt"></i> <strong>Pedido a domicilio o para llevar:</strong><br> 9933163939</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mapa bg-white p-3 rounded shadow-sm">
                        <iframe 
                        
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3785.283292849338!2d-93.088695!3d18.425442200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ee5f8d506155db%3A0xc0bd6814115676c6!2sC.%20Ixmucare%2C%2086620%20Chiltepec%2C%20Tab.!5e0!3m2!1ses-419!2smx!4v1732168842537!5m2!1ses-419!2smx"
                            width="100%" height="300" frameborder="0" style="border:0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
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
