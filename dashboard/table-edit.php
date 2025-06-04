<?php
include 'main/header.php';
if (!isset($_SESSION['isLoggedIn'])) {
    echo '<script>window.location="login.php"</script>';
}

include 'dbCon.php'; // Incluir el archivo de conexión a la base de datos
$con = connect(); // Establecer la conexión

// Verificar si se ha enviado el id de la mesa y obtener los datos actuales de esa mesa
if (isset($_GET['table_id'])) {
    $table_id = $_GET['table_id'];

    // Obtener los datos actuales de la mesa
    $sql = "SELECT * FROM `restaurant_tables` WHERE `id` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $table_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $table = $result->fetch_assoc(); // Obtener los datos de la mesa como un arreglo asociativo
    $stmt->close();
}

// Actualizar los datos de la mesa cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table_name = $_POST['table_name'];
    $chair_count = $_POST['chair_count'];
    $table_id = $_POST['table_id'];

    // Actualizar los datos de la mesa en la base de datos
    $sql = "UPDATE `restaurant_tables` SET `table_name` = ?, `chair_count` = ? WHERE `id` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sii", $table_name, $chair_count, $table_id);

    if ($stmt->execute()) {
        // Mensaje de éxito y redirigir a la página de lista de mesas
        echo '<script>alert("Mesa actualizada correctamente."); window.location="table-list.php";</script>';
    } else {
        // Mensaje de error si la actualización falla
        echo '<script>alert("No se pudo actualizar la mesa. Por favor, inténtalo de nuevo.");</script>';
    }

    $stmt->close();
}

$con->close(); // Cerrar la conexión a la base de datos
?>

<body>
    <section class="body">
        <!-- inicio: encabezado -->
        <?php include 'main/top-bar.php'; ?>
        <!-- fin: encabezado -->

        <div class="inner-wrapper">
            <!-- inicio: barra lateral -->
            <?php include 'main/left-bar.php'; ?>
            <!-- fin: barra lateral -->

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>Editar Mesa</h2>
                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span>Mesas</span></li>
                            <li><span>Editar Mesa</span></li>
                        </ol>
                        <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
                    </div>
                </header>

                <!-- inicio: página -->
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>
                        <h2 class="panel-title">Editar Mesa</h2>
                    </header>
                    <div class="panel-body">
                        <form action="table-edit.php" method="post">
                            <input type="hidden" name="table_id" value="<?php echo htmlspecialchars($table['id']); ?>">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="table_name">Nombre de la Mesa</label>
                                    <input type="text" class="form-control" name="table_name"
                                        value="<?php echo htmlspecialchars($table['table_name']); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="chair_count">Número de Sillas</label>
                                    <input type="number" class="form-control" name="chair_count"
                                        value="<?php echo htmlspecialchars($table['chair_count']); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group"><br>
                                <button type="submit" class="btn btn-primary">Actualizar Mesa</button>
                                <a href="table-list.php" class="btn" style="background-color: #ff6600; color: white;">Cancelar</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- fin: página -->
            </section>
        </div>

        <?php include 'main/right-bar.php'; ?>
    </section>

    <!-- Proveedores -->
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Proveedores específicos de la página -->
    <script src="assets/vendor/select2/select2.js"></script>
    <script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

    <!-- Tema base, componentes y configuración -->
    <script src="assets/javascripts/theme.js"></script>

    <!-- Tema personalizado -->
    <script src="assets/javascripts/theme.custom.js"></script>

    <!-- Archivos de inicialización del tema -->
    <script src="assets/javascripts/theme.init.js"></script>
</body>

</html>
