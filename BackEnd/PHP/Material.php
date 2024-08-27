Para que entre y salga el material. 

<?php
include 'conexion/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM materiales WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $material = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $unidad = $_POST['unidad'];

    $stmt = $conn->prepare("UPDATE materiales SET nombre = :nombre, cantidad = :cantidad, unidad = :unidad WHERE id = :id");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':unidad', $unidad);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar el material.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Material</title>
</head>
<body>
    <h1>Editar Material</h1>

    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $material['id']; ?>">

        <label for="nombre">Nombre del Material:</label>
        <input type="text" name="nombre" value="<?php echo $material['nombre']; ?>" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $material['cantidad']; ?>" required><br>

        <label for="unidad">Unidad de Medida:</label>
        <input type="text" name="unidad" value="<?php echo $material['unidad']; ?>" required><br>

        <button type="submit">Actualizar Material</button>
    </form>
</body>
</html>
