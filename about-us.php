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
    <!-- SOBRE NOSOTROS -->
    <section id="sobre-nosotros">
        <div class="content-wrapper">
            <div class="collage">
                <!-- <div class="collage-row">
                    <img src="assets/images/t-us/about-us-1.jpg" alt="Imagen 1" class="collage-rect">
                </div> -->
                <div class="banner-content">
                    <h2>SOBRE NOSOTROS</h2>
                </div>
                
                <div class="text-content">
                    <!-- <h2>SOBRE NOSOTROS</h2> -->
                    <p>Ecoturística Ixmucare es un restaurante ubicado en Paraíso, Tabasco, que surge con el propósito de ofrecer una experiencia única y completa en un ambiente ecoturístico, donde se combinan la naturaleza, la gastronomía regional, la cultura tabasqueña y el servicio de alta calidad.</p>
                    <p>Nuestro nombre "Ixmucané" proviene de la mitología maya y significa "dueña del maíz", honrando así nuestras raíces ancestrales y la riqueza cultural de nuestra región.</p>
                    <p>Somos un lugar donde los visitantes pueden disfrutar de deliciosos platillos elaborados con ingredientes frescos y locales, música en vivo, áreas de juego para niños y, en general, un ambiente relajado y agradable que conecta a nuestros huéspedes con la belleza natural que nos rodea.</p>
                </div>
                <div class="collage-row">
                    <img src="assets/images/about-us/about-us-4.jpg" alt="Imagen 2" class="collage-square">
                    <img src="assets/images/about-us/about-us-5.jpg" alt="Imagen 3" class="collage-square">
                </div>
            </div>
        </div>
    </section>

    <section id="banner">
        <div class="content-wrapper">
            <div class="collage">
                <div class="banner-content">
                    <h2>NUESTRO EQUIPO</h2>
                </div>

                <div class="text-content">
                    <p>Este sitio web fue desarrollado por estudiantes de la Universidad Juárez Autónoma de Tabasco (UJAT) de la División Académica de Ciencias y Tecnologías de la Información (DACyTI), comprometidos con el desarrollo de soluciones tecnológicas innovadoras orientadas a la mejora social, académica y profesional de la comunidad.</p>
                </div>
                            <!-- PÁRRAFO FINAL -->
                            
                            <!-- <div class="collage-row">
                                <img src="assets/images/about-us/about-us-6.jpg" alt="Imagen 2" class="collage-square">
                                <img src="assets/images/about-us/about-us-7.jpg" alt="Imagen 3" class="collage-square">
                            </div> -->
                            
                            <!-- NUEVA SECCIÓN DE MIEMBROS DEL EQUIPO -->
                            <div class="team-section">
                                <div class="team-member">
                                    <img src="assets/images/team/carlos.png" alt="Carlos Antonio Angulo Arias" class="team-avatar">
                                    <div class="team-info">
                                        <h3>Carlos Antonio Angulo Arias</h3>
                                        <p>Product Owner / Editor</p>
                                    </div>
                                </div>
                                
                                <div class="team-member">
                                    <img src="assets/images/team/jesus.png" alt="Jesús del Carmen Pérez Pablo" class="team-avatar">
                                    <div class="team-info">
                                        <h3>Jesús del Carmen Pérez Pablo</h3>
                                        <p>Team Development / Editor</p>
                                    </div>
                                </div>                                
                                <div class="team-member">
                                    <img src="assets/images/team/laura.png" alt="Dra. Laura Beatriz Vidal Turrubiates" class="team-avatar">
                                    <div class="team-info">
                                        <h3>Dra. Laura Beatriz Vidal Turrubiates</h3>
                                        <p>Scrum Master / Editora Asesora</p>
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <!-- SECCIÓN DE IMÁGENES -->
    <style>
    .team-section {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-top: 2rem;
}

.team-member {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.team-avatar {
    width: 80px;
    /* height: 80px; */
    /* border-radius: 50%; */
    object-fit: cover;
    /* border: 2px solid #ccc; */
}

.team-info h3 {
    margin: 0;
    font-size: 1.1rem;
}

.team-info p {
    margin: 0;
    font-size: 0.95rem;
    color: #666;
}
    
    </style>

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
