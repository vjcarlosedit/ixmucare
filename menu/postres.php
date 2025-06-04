<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ixmucare - Un lugar mágico</title>
    <link rel="stylesheet" href="platillos.css">
    <script src="scrip.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- MENÚ DE NAVEGACIÓN -->
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../assets/images/icons/logo-ixmucare.png" alt="Logo Ixmucare">
            </a>        
        </div>
        <nav>
            <ul>
                <!-- <li><a href="index.php" class="select-btn" >Inicio</a></li> -->
                <li><a href="../menu.php">Menú</a></li>
                <li><a href="../login.php">Reservaciones</a></li>
                <li><a href="../gallery.php">Galería</a></li>
                <li><a href="../contact.php">Contacto</a></li>
                <li><a href="../about-us.php">Acerca De</a></li>
                <!-- <li><a href="http://localhost/ixmucare-admin/login.php" class="login-btn">Iniciar Sesión</a></li> -->
            </ul>
        </nav>
    </header>

    <section id="platillos">
        <h2 class="category-title">ENTRADAS</h2>
        <div class="platillos-grid">
            <div class="platillo-card" onclick="openModal('platillo1')">
                <img src="assets/images/menu/postres/Cheesecake_de_snickers.jpg" alt="Fuente de mariscos" class="platillo-img">
                <h3>Cheesecake de snickers</h3>
                <p class="price">$100</p>
                <!-- <button class="add-to-cart-btn" onclick="window.location.href='http://localhost/ixmucare-admin/login.php'">
                    <i class="fas fa-plus"></i>
                </button> -->
            </div>
            <div class="platillo-card" onclick="openModal('platillo2')">
                <img src="assets/images/menu/postres/Cheesecake_de-fresa.jpg" alt="Festín de camarones" class="platillo-img">
                <h3>Cheesecake de fresa</h3>
                <p class="price">$100</p>
                <!-- <button class="add-to-cart-btn" onclick="window.location.href='http://localhost/ixmucare-admin/login.php'">
                    <i class="fas fa-plus"></i>
                </button> -->
            </div>
            <div class="platillo-card" onclick="openModal('platillo3')">
                <img src="assets/images/menu/postres/Cheesecakede_maracuya.jpg" alt="Dedos de pescado tempura" class="platillo-img">
                <h3>Cheesecakede maracuya</h3>
                <p class="price">$100</p>
                <!-- <button class="add-to-cart-btn" onclick="window.location.href='http://localhost/ixmucare-admin/login.php'">
                    <i class="fas fa-plus"></i>
                </button> -->
            </div>
            <div class="platillo-card" onclick="openModal('platillo3')">
                <img src="assets/images/menu/postres/Cheesecakede_oreo.jpg" alt="Dedos de pescado tempura" class="platillo-img">
                <h3>Cheesecakede oreo</h3>
                <p class="price">$100</p>
                <!-- <button class="add-to-cart-btn" onclick="window.location.href='http://localhost/ixmucare-admin/login.php'">
                    <i class="fas fa-plus"></i>
                </button> -->
            </div>
            <div class="platillo-card" onclick="openModal('platillo3')">
                <img src="assets/images/menu/postres/Brownie_helado.jpg" alt="Dedos de pescado tempura" class="platillo-img">
                <h3>Brownie c/helado</h3>
                <p class="price">$100</p>
                <!-- <button class="add-to-cart-btn" onclick="window.location.href='http://localhost/ixmucare-admin/login.php'">
                    <i class="fas fa-plus"></i>
                </button> -->
            </div>
            <!-- Agrega más platillos de forma similar -->
        </div>
    </section>
    
    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <img src="" alt="Detalle del platillo" id="modal-img" class="modal-img">
            <h3 id="modal-title"></h3>
            <p id="modal-price"></p>
            <p id="modal-description">Descripción breve del platillo.</p>
        </div>
    </div>
    


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
