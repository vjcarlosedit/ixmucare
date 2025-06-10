<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include 'dbCon.php';
$conn = connect();

$approvedBy = $_SESSION['email'];

// Validar acción y ID
if (isset($_GET['action'], $_GET['id']) && is_numeric($_GET['id'])) {
    $action = $_GET['action'];
    $reservationId = (int) $_GET['id'];

    if ($action === 'approve') {
        $conn->query("UPDATE reservations SET status = 1, approvedBy = '$approvedBy' WHERE id = $reservationId");
    } elseif ($action === 'reject') {
        $conn->query("UPDATE reservations SET status = 9, approvedBy = '$approvedBy' WHERE id = $reservationId");
    }
}

// Obtener todas las reservaciones
$query = "
    SELECT reservations.id, reservations.name, reservations.date, reservations.time, reservations.guests, 
           restaurant_tables.table_name, reservations.status, reservations.approvedBy
    FROM reservations
    JOIN restaurant_tables ON reservations.table_id = restaurant_tables.id
";
$result = $conn->query($query);
?>

<!doctype html>
<html class="fixed">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Reservaciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Estilos y librerías -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
    <script src="assets/vendor/modernizr/modernizr.js"></script>
</head>
<body>
<section class="body">
    <?php include 'main/top-bar.php'; ?>
    <div class="inner-wrapper">
        <?php include 'main/left-bar.php'; ?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Reservaciones</h2>
                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                        <li><span>Lista de Reservaciones</span></li>
                    </ol>
                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Listado de Reservaciones</h2>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Personas</th>
                                <th>Mesa</th>
                                <th>Estado</th>
                                <th>Aprobado Por</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['date']}</td>";
                                    echo "<td>{$row['time']}</td>";
                                    echo "<td>{$row['guests']}</td>";
                                    echo "<td>{$row['table_name']}</td>";

                                    switch ($row['status']) {
                                        case 0:
                                            echo "<td><span class='badge bg-warning'>Pendiente</span></td>";
                                            break;
                                        case 1:
                                            echo "<td><span class='badge bg-success'>Aprobada</span></td>";
                                            break;
                                        case 9:
                                            echo "<td><span class='badge bg-danger'>Rechazada</span></td>";
                                            break;
                                    }

                                    echo "<td>{$row['approvedBy']}</td>";
                                    echo "<td>
                                            <a href='?action=approve&id={$row['id']}' class='btn btn-success btn-sm'>Aprobar</a>
                                            <a href='?action=reject&id={$row['id']}' class='btn btn-danger btn-sm'>Rechazar</a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No hay reservaciones</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </div>
</section>

<!-- Scripts -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<!-- <script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script> -->
<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="assets/javascripts/theme.js"></script>
<script src="assets/javascripts/theme.init.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable-default').DataTable();
    });
</script>
</body>
</html>
