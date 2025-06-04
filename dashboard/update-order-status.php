<?php
include 'dbCon.php';
$con = connect();

if (isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = intval($_POST['order_id']);
    $status = intval($_POST['status']);

    // Update the order status in the database
    $stmt = $con->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->bind_param("ii", $status, $order_id);

    if ($stmt->execute()) {
        echo 'Estado del pedido actualizado correctamente.';
    } else {
        echo 'Error al actualizar el estado del pedido.';
    }


    $stmt->close();
}
$con->close();
?>
