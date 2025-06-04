<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ixmucare - Un lugar mágico</title>
    <link rel="stylesheet" href="styles/galeria.css">
    <script src="scripts/modal-galeria.js"></script>
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

    <section id="galeria">
        <div class="container">
            <h2 class="gallery-title">Nuestra Galería</h2>
            <p class="gallery-subtitle">Explora los momentos y sabores únicos de Ixmucare</p>
            
            <!-- Galería de Imágenes -->
            <div class="gallery-grid">
                <!-- Agregar tantas imágenes como necesites -->
                <img src="assets/images/gallery/gallery-img-1.jpg" alt="Foto 1" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-2.jpg" alt="Foto 2" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-3.jpg" alt="Foto 3" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-4.jpg" alt="Foto 4" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-5.jpg" alt="Foto 5" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-6.jpg" alt="Foto 6" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-7.jpg" alt="Foto 7" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-8.jpg" alt="Foto 8" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-9.jpg" alt="Foto 9" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-10.jpg" alt="Foto 10" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-11.jpg" alt="Foto 11" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-12.jpg" alt="Foto 12" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-13.jpg" alt="Foto 13" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-14.jpg" alt="Foto 14" class="gallery-image">
                <img src="assets/images/gallery/gallery-img-15.jpg" alt="Foto 15" class="gallery-image">
            </div>
        </div>
    
        <!-- Modal -->
        <div id="modal" class="modal">
            <span class="close">&times;</span>
            <button class="prev">&lt;</button>
            <img class="modal-content" id="modal-image">
            <button class="next">&gt;</button>
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
