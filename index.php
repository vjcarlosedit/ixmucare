<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ixmucare - Un lugar mágico</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js"></script>
    <script src="scripts/carrusel.js"></script>
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
    <!-- CARRUSEL DE IMÁGENES -->
    <!-- <section class="carousel">
        <div class="carousel-slide">
            <img src="assets/images/carousel/carousel-1.jpg" alt="Imagen 1">
            <img src="assets/images/carousel/carousel-1.jpg" alt="Imagen 2">
            <img src="assets/images/carousel/carousel-1.jpg" alt="Imagen 3">
            <img src="assets/images/carousel/carousel-1.jpg" alt="Imagen 4">
            <img src="assets/images/carousel/carousel-1.jpg" alt="Imagen 5">
        </div>
    </section> -->

    <div class="carousel">
        <div class="carousel-slide">
            <img src="assets/images/carousel/1.png" alt="Imagen 1">
            <img src="assets/images/carousel/2.png" alt="Imagen 2">
            <img src="assets/images/carousel/3.png" alt="Imagen 3">
               <!-- Duplicado de la primera imagen -->
            <!-- <img src="assets/images/carousel/1.png" alt="Imagen 1"> -->
        </div>
        <button id="prev"><i class="fas fa-chevron-left"></i></button>
        <button id="next"><i class="fas fa-chevron-right"></i></button>
        <div class="carousel-indicators">
            <span data-index="0" class="active"></span>
            <span data-index="1"></span>
            <span data-index="2"></span>
        </div>
    </div>
    
    
    <!-- SOBRE NOSOTROS -->
    <section id="sobre-nosotros">
        <div class="content-wrapper">
            <div class="collage">
                <div class="collage-row">
                    <img src="assets/images/about-us/about-us-1.jpg" alt="Imagen 1" class="collage-rect">
                </div>
                <div class="collage-row">
                    <img src="assets/images/about-us/about-us-2.jpg" alt="Imagen 2" class="collage-square">
                    <img src="assets/images/about-us/about-us-3.jpg" alt="Imagen 3" class="collage-square">
                </div>
            </div>
            <div class="text-content">
                <h2>SOBRE NOSOTROS</h2>
                <p>Ecoturística Ixmucare surge en 2020 con la visión de ofrecer a los habitantes de Paraíso y a sus visitantes una experiencia gastronómica única en un entorno natural inigualable.</p>
                <p>Este restaurante se especializa en platillos autóctonos y contemporáneos, elaborados con ingredientes frescos y locales. Los comensales disfrutan de una deliciosa comida mientras se sumergen en la belleza de la naturaleza que rodea el lugar.</p>
            </div>
        </div>
    </section>
    <!-- NUESTRO MENÚ -->
    <section id="banner">
        <div class="banner-content">
            <h2>NUESTRO MENÚ</h2>
            <p>Te ofrecemos un menú variado y exquisito que combina recetas tradicionales con innovaciones contemporáneas, <br> creando experiencias culinarias que te sorprenderán.</p>
            <a href="menu.php" class="btn-explorar">EXPLORAR MENÚ</a>
        </div>
        <div id="menu-categorias">
            <div class="categoria-card">
                <img src="assets/images/categories/pescado.jpg" alt="Pescados" class="categoria-img">
                <h3>PESCADOS</h3>
            </div>
            <div class="categoria-card">
                <img src="assets/images/categories/marisco.jpg" alt="Mariscos" class="categoria-img">
                <h3>MARISCOS</h3>
            </div>
            <div class="categoria-card">
                <img src="assets/images/categories/carne.jpg" alt="Bebidas" class="categoria-img">
                <h3>CARNES</h3>
            </div>
            <div class="categoria-card">
                <img src="assets/images/categories/bebida.jpg" alt="Carnes" class="categoria-img">
                <h3>BEBIDAS</h3>
            </div>
        </div>
    </section>
    <!-- NUESTROS SERVICIOS -->
    <section id="nuestros-servicios">
        <div class="servicios-header">
            <h2>NUESTROS SERVICIOS</h2>
            <p>Ofrecemos una variedad de servicios para hacer de su visita una experiencia inolvidable. Disfrute de nuestro ambiente natural y acogedor, con todas las comodidades que necesita para eventos especiales o una comida en familia.</p>
        </div>
        <div class="servicios-stats">
            <div class="stat-item">
                <i class="fas fa-utensils"></i>
                <h3>100+</h3>
                <p>Platillos Autóctonos</p>
            </div>
            <div class="stat-item">
                <i class="fas fa-music"></i>
                <h3>50+</h3>
                <p>Eventos Especiales</p>
            </div>
            <div class="stat-item">
                <i class="fas fa-leaf"></i>
                <h3>100%</h3>
                <p>Entorno Natual</p>
            </div>
            <div class="stat-item">
                <i class="fas fa-handshake"></i>
                <h3>5+</h3>
                <p>Años De Servicio</p>
            </div>
        </div>
    </section>
    <!-- GALERIA DE IMAGENES -->
    <section id="galeria-platillos">
        <div class="galeria-header">
            <h2>GALERÍA DE IMÁGENES</h2>
            <p>En esta galería podrás explorar una variedad de imágenes que destacan tanto nuestros deliciosos platillos como el encantador ambiente de Ixmucare.</p>
            <div class="divider"></div>
        </div>
        <div class="galeria-grid">
            <div class="platillo-card">
                <img src="assets/images/gallery/gallery-1.jpg" alt="Ostiones al tapesco">
            </div>
            <div class="platillo-card">
                <img src="assets/images/gallery/gallery-2.jpg" alt="Aguachile pasión">
            </div>
            <div class="platillo-card">
                <img src="assets/images/gallery/gallery-3.jpg" alt="Aros de calamar">
            </div>
            <div class="platillo-card">
                <img src="assets/images/gallery/gallery-4.jpg" alt="Camarones a la mantequilla">
            </div>
            <div class="platillo-card">
                <img src="assets/images/gallery/gallery-5.jpg" alt="Calamares a la jardinera">
            </div>
        </div>
        <div class="boton-galeria">
            <a href="gallery.php" class="btn-explorar">EXPLORAR GALERÍA</a>
        </div>
    </section>
        <!-- TEXTO DE BIENVENIDA -->
    <section id="bienvenida"> 
        <div class="bienvenida-content">
            <div class="quote-icon left-quote">❝</div>
            <div class="quote-text">
                <img src="assets/images/icons/author.jpg" alt="Ixmucare" class="author-image">
                <p>En Ixmucare, encontrarás deliciosos y variados platillos en un ambiente 100% familiar, rodeado de paisajes naturales. Te ofrecemos una atención de calidad que te hará sentir en casa. ¡Te invitamos a conocernos!</p>
                <h3 class="author-name">Ixmucare</h3>
            </div>
            <div class="quote-icon right-quote">❞</div>
        </div>
        <div>
        <a href="register.php" class="register-btn">REGISTRARSE</a>
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
