<?php
include 'dbCon.php';
$con = connect(); 

if (isset($_GET['table_id'])) {
    $table_id = $_GET['table_id'];

    $sql = "DELETE FROM `restaurant_tables` WHERE `id` = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $table_id);

    if ($stmt->execute()) {
        // Mensaje de éxito y redirección de vuelta a la página de lista de mesas
        echo '<script>alert("Mesa eliminada correctamente."); window.location="table-list.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar la mesa. Por favor, inténtalo de nuevo."); window.location="table-list.php";</script>';
    }
    
    $stmt->close();
}

$con->close();
?>
