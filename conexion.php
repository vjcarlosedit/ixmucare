<?php
$host = "localhost";
$dbname = "ixmucare_db";
$username = "root"; // Usuario por defecto en XAMPP
$password = ""; // Sin contraseña por defecto

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
