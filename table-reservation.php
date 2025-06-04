<?php
session_start();


// Check if the user is logged in
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== TRUE) {
    echo '<script>alert("You must be logged in to make a reservation."); window.location.href="login.php";</script>';
    exit();
}

// Database connection
include 'dbCon.php';
$con = connect();

// Fetch all tables from the restaurant_tables table
$sql = "SELECT * FROM restaurant_tables"; // Fetch all tables
$result = $con->query($sql);

// Fetch user details from the session
$user_name = $_SESSION['username'];
$user_email = $_SESSION['email'];
$user_phone = $_SESSION['phone'];
$user_role = $_SESSION['user_role'];


if ($_SESSION['role'] == 'admin') {
    echo '<script>window.location="login.php";</script>';

}

//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
// Close the database connection
$con->close();
?>

<?php include 'main/header.php'; ?>

<head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

<body>
    <?php include 'main/nav-bar.php'; ?>

    <section class="home-slider owl-carousel" style="height: 400px;">
        <div class="slider-item" style="background-image: url('images/table-res.jpg');"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-10 col-sm-12 ftco-animate text-center" style="padding-bottom: 25%;">
                        <!-- <p class="breadcrumbs">
                            <span class="mr-2"><a href="index.php">Home</a></span>
                            <span>Reservation</span>
                        </p> -->
                        <h1 class="mb-3">Reserva tu mesa</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Reservación</span>
                    <h2>Elige tu mesa</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 dish-menu">
                    <div class="nav nav-pills justify-content-center ftco-animate">
                        <div class="tab-content py-5" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
                                <div class="row">
                                    <div class="table-container">
                                        <?php while ($row = $result->fetch_assoc()) {
                                            $table_id = $row['id'];
                                            $table_name = $row['table_name'];
                                            $chair_count = $row['chair_count'];
                                            $table_status = $row['status']; // 0 disponible, 1 reservado
                                        ?>
                                            <div class="table" data-id="<?php echo $table_id; ?>"
                                                data-chairs="<?php echo $chair_count; ?>" <?php echo ($table_status == 1) ? 'class="disabled-table"' : ''; ?>
                                                onclick="<?php echo ($table_status == 1) ? 'showAlert(); return false;' : 'selectTable(this)'; ?>">
                                                <div class="table-info">
                                                    <strong><?php echo $table_name; ?></strong>
                                                    <p>Asientos: <?php echo $chair_count; ?></p>
                                                </div>
                                                <div class="chair-layout">
                                                    <?php
                                                    for ($i = 0; $i < $chair_count; $i++) {
                                                        echo '<div class="chair"></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form id="reservationForm" action="process-reservation.php" method="POST">
                                <input type="hidden" name="table_id" id="selectedTable" value="">

                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="<?php echo $user_name; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo electrónico:</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="<?php echo $user_email; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Teléfono:</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="<?php echo $user_phone; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="guests">Número de invitados:</label>
                                    <input type="number" id="guests" name="guests" class="form-control" min="1" max=""
                                        required>
                                    <small class="form-text text-muted" id="chairCountInfo"></small>
                                </div>

                                <div class="form-group">
                                    <label for="date">Fecha de reservación:</label>
                                    <input type="date" id="date" name="date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="time">Hora de reservación:</label>
                                    <input type="time" id="time" name="time" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Reservar ahora" class="btn btn-primary py-3 px-5"
                                        id="reserveButton" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Botón para abrir el asistente -->
    <button id="toggleBot">Abrir Asistente</button>

    <!-- Contenedor del bot -->
    <section id="botChat" class="bot-chat-section">
    <div class="bot-header">
        <h3>Asistente Virtual de Reservaciones</h3>
        <button id="closeBot" title="Cerrar">×</button>
    </div>
    <div id="chatWindow" class="chat-window">
        <div><em>Bot:</em> Hola, te ayudaré a reservar tu mesa. ¿Cuál es tu nombre completo?</div>
    </div>
    <input type="text" id="userInput" placeholder="Escribe aquí..." autocomplete="off" />
    <button id="sendBtn">Enviar</button>
    </section>

    <!-- Estilos del bot -->
    <style>
    #toggleBot {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        padding: 12px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 16px;
    }

    .bot-chat-section {
        position: fixed;
        bottom: 70px;
        right: 20px;
        width: 350px;
        max-width: 90vw;
        height: 500px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        z-index: 1000;
        padding: 15px;
        font-family: Arial, sans-serif;
        box-sizing: border-box;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        visibility: hidden;
        opacity: 0;
    }

    .bot-chat-section.show {
        visibility: visible;
        opacity: 1;
    }

    .bot-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .bot-header h3 {
        margin: 0;
        font-size: 16px;
    }

    .bot-header button {
        background: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
        font-weight: bold;
        line-height: 1;
    }

    .chat-window {
        height: 380px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        background: white;
        border-radius: 5px;
        font-size: 13px;
    }

    #userInput {
    width: calc(100% - 90px);
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    float: left;
    margin-top: 5px;
    }

    #sendBtn {
    width: 80px;
    margin-left: 5px;
    margin-top: 5px;
    padding: 8px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    float: left;
    }
    
    .bot-chat-section::after {
    content: "";
    display: table;
    clear: both;
    }


    #userInput {
        padding: 8px;
    }

    #sendBtn {
        padding: 8px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>

    <!-- Script del bot -->
    <script>
    const toggleBotBtn = document.getElementById('toggleBot');
    const botChat = document.getElementById('botChat');
    const closeBotBtn = document.getElementById('closeBot');
    const chatWindow = document.getElementById('chatWindow');
    const input = document.getElementById('userInput');
    const sendBtn = document.getElementById('sendBtn');

    toggleBotBtn.addEventListener('click', () => {
        botChat.classList.add('show');
        input.disabled = false;
        sendBtn.disabled = false;
        input.focus();
    });

    closeBotBtn.addEventListener('click', () => {
        botChat.classList.remove('show');
    });

    const reservationData = {
        nombre: '',
        correo: '',
        telefono: '',
        invitados: '',
        fecha: '',
        hora: ''
    };

    let step = 0;

    function sendMessage() {
        const userText = input.value.trim();
        if (!userText) return;

        const userMessage = document.createElement('div');
        userMessage.innerHTML = `<strong>Tú:</strong> ${userText}`;
        userMessage.style.marginTop = '10px';
        chatWindow.appendChild(userMessage);

        input.value = '';
        chatWindow.scrollTop = chatWindow.scrollHeight;

        switch(step) {
        case 0:
            reservationData.nombre = userText;
            botReply('Gracias, ' + reservationData.nombre + '. ¿Cuál es tu correo electrónico?');
            step++;
            break;
        case 1:
            if (!validateEmail(userText)) {
            botReply('Por favor, escribe un correo electrónico válido.');
            } else {
            reservationData.correo = userText;
            botReply('Correo recibido. ¿Cuál es tu número de teléfono?');
            step++;
            }
            break;
        case 2:
            if (!validatePhone(userText)) {
            botReply('Por favor, escribe un número de teléfono válido (solo números).');
            } else {
            reservationData.telefono = userText;
            botReply('Perfecto. ¿Cuántos invitados serán?');
            step++;
            }
            break;
        case 3:
            if (!validateGuests(userText)) {
            botReply('Por favor, ingresa un número válido de invitados.');
            } else {
            reservationData.invitados = userText;
            botReply('¿Para qué fecha quieres la reservación? (dd/mm/aaaa)');
            step++;
            }
            break;
        case 4:
            if (!validateDate(userText)) {
            botReply('Por favor, ingresa una fecha válida en formato dd/mm/aaaa.');
            } else {
            reservationData.fecha = userText;
            botReply('¿A qué hora será la reservación? (ejemplo: 20:30)');
            step++;
            }
            break;
        case 5:
            if (!validateTime(userText)) {
            botReply('Por favor, ingresa una hora válida en formato 24 horas (ejemplo: 20:30).');
            } else {
            reservationData.hora = userText;
            botReply('¡Gracias! Aquí están los datos de tu reservación:');
            botReply(
                `Nombre: ${reservationData.nombre}<br>` +
                `Correo: ${reservationData.correo}<br>` +
                `Teléfono: ${reservationData.telefono}<br>` +
                `Invitados: ${reservationData.invitados}<br>` +
                `Fecha: ${reservationData.fecha}<br>` +
                `Hora: ${reservationData.hora}`
            );
            botReply('Nos pondremos en contacto contigo para confirmar tu reservación.');
            step++;
            input.disabled = true;
            sendBtn.disabled = true;
            }
            break;
        default:
            break;
        }
        chatWindow.scrollTop = chatWindow.scrollHeight;
    }

    function botReply(message) {
        setTimeout(() => {
        const botMessage = document.createElement('div');
        botMessage.innerHTML = `<em>Bot:</em> ${message}`;
        botMessage.style.marginTop = '10px';
        chatWindow.appendChild(botMessage);
        chatWindow.scrollTop = chatWindow.scrollHeight;
        }, 700);
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email.toLowerCase());
    }

    function validatePhone(phone) {
        const re = /^\d{7,15}$/;
        return re.test(phone);
    }

    function validateGuests(guests) {
        const num = parseInt(guests, 10);
        return !isNaN(num) && num > 0 && num < 100;
    }

    function validateDate(date) {
        const re = /^(\d{2})\/(\d{2})\/(\d{4})$/;
        if (!re.test(date)) return false;
        const parts = date.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        const dt = new Date(year, month, day);
        return dt && dt.getDate() === day && dt.getMonth() === month && dt.getFullYear() === year;
    }

    function validateTime(time) {
        const re = /^([01]\d|2[0-3]):([0-5]\d)$/;
        return re.test(time);
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
    </script>

    <!-- <?php include 'main/instagram.php'; ?> -->
    <!-- <?php include 'main/footer.php'; ?> -->
    <?php include 'main/script.php'; ?>

    <script>
    function selectTable(tableElement) {
        // Verifica si la mesa está deshabilitada
        if (tableElement.classList.contains('disabled-table')) {
            Swal.fire({
                icon: 'warning',
                title: 'Mesa ya reservada',
                text: 'Esta mesa ya ha sido reservada. Por favor, intenta con otra mesa.',
                confirmButtonText: 'Aceptar'
            });
            return; // Salir si la mesa está deshabilitada
        }

        // Quita la clase de seleccionada de cualquier mesa previamente seleccionada
        const previousSelected = document.querySelector('.table.selected');
        if (previousSelected) {
            previousSelected.classList.remove('selected');
        }

        // Marca la mesa clickeada como seleccionada
        tableElement.classList.add('selected');

        // Obtiene el ID de la mesa y la cantidad de sillas desde los atributos data
        const tableId = tableElement.getAttribute('data-id');
        const chairCount = tableElement.getAttribute('data-chairs');

        // Actualiza el campo oculto con el ID de la mesa seleccionada
        document.getElementById('selectedTable').value = tableId;

        // Establece el número máximo de invitados permitido basado en la cantidad de sillas
        const guestInput = document.getElementById('guests');
        guestInput.max = chairCount;
        document.getElementById('chairCountInfo').textContent = `Esta mesa tiene ${chairCount} asientos disponibles.`;

        // Habilita el botón de Reservar
        document.getElementById('reserveButton').disabled = false;
    }

    function showAlert() {
        alert("Esta mesa ya está reservada. Por favor, selecciona otra mesa.");
    }

    // Evita el envío del formulario si los invitados superan la cantidad de sillas
    document.getElementById('reservationForm').addEventListener('submit', function (e) {
        const guests = parseInt(document.getElementById('guests').value);
        const maxGuests = parseInt(document.getElementById('guests').max);

        if (guests > maxGuests) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Número de invitados no válido',
                text: `El número de invitados no puede exceder los asientos disponibles (${maxGuests}).`,
                confirmButtonText: 'Aceptar'
            });
        }
    });

    </script>

    <style>
        .table-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .table {
            background-color: #2c3e50;
            padding: 20px;
            text-align: center;
            border-radius: 15px;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .table:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .table.selected {
            border: 3px solid #e74c3c;
        }

        .table.disabled-table {
            pointer-events: none;
            /* Prevent click */
            opacity: 0.5;
            /* Make it look disabled */
        }

        .table-info {
            color: white;
            margin-bottom: 10px;
        }

        .chair-layout {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .chair {
            background-color: #ecf0f1;
            width: 25px;
            height: 25px;
            margin: 5px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        .table:hover .chair {
            background-color: #bdc3c7;
        }

        /* Disabled Reserve Now button style */
        #reserveButton[disabled] {
            background-color: #7f8c8d;
            cursor: not-allowed;
        }
    </style>
</body>

</html>