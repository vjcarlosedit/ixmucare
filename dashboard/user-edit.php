<?php
session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<script>window.location="login.php"</script>';
}

include 'dbCon.php';
$con = connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los detalles actuales del usuario
    $sql = "SELECT * FROM `users` WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Actualizar detalles del usuario
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];

        $update_sql = "UPDATE `users` SET username = ?, email = ?, phone = ?, gender = ?, address = ? WHERE id = ?";
        $update_stmt = $con->prepare($update_sql);
        $update_stmt->bind_param('sssssi', $username, $email, $phone, $gender, $address, $id);

        if ($update_stmt->execute()) {
            echo '<script>alert("¡Usuario actualizado con éxito!");</script>';
            echo '<script>window.location="user-list.php"</script>';
        } else {
            echo '<script>alert("¡Error al actualizar el usuario!");</script>';
        }
    }
} else {
    echo '<script>window.location="user-list.php"</script>';
}
?>

<!doctype html>
<html class="fixed">
    <?php include 'main/header.php'; ?>
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
                        <h2>Editar Usuario</h2>
                    
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </li>
                                <li><span>Usuarios</span></li>
                                <li><span>Editar Usuario</span></li>
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

                            <h2 class="panel-title">Editar Detalles del Usuario</h2>
                        </header>
                        <div class="panel-body">
                            <form method="POST" class="form-horizontal form-bordered">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="username">Nombre de usuario</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Correo electrónico</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="phone">Teléfono</label>
                                    <div class="col-md-6">
                                    <input type="tel" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" maxlength="10" required pattern="\d{10}" title="Por favor ingrese un número de teléfono de 10 dígitos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="gender">Género</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="gender" required>
                                            <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Masculino</option>
                                            <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Femenino</option>
                                            <option value="Other" <?php if ($user['gender'] == 'Other') echo 'selected'; ?>>Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="address">Dirección</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="address" required><?php echo $user['address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" name="update" class="btn btn-primary">Actualizar</button>
                                        <a href="user-list.php" class="btn btn-default">Cancelar</a>
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

        <!-- Vendor -->
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="assets/javascripts/theme.js"></script>

        <!-- Theme Custom -->
        <script src="assets/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="assets/javascripts/theme.init.js"></script>
    </body>
</html>
