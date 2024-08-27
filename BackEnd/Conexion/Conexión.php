<?php
// Datos de conexión
$host = "localhost";        // Host donde está la base de datos
$db_name = "inventario_constructora";  // Nombre de la base de datos
$username = "root";         // Usuario de la base de datos
$password = "";             // Contraseña de la base de datos

try {
    // Crear una nueva conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    
    // Configurar PDO para que lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar la conexión
    echo "Conexión exitosa!";
} catch(PDOException $e) {
    // Mostrar el error si falla la conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>
