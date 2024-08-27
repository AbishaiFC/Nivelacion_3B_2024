pagina principal

<?php
include 'conexion/db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Materiales</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Inventario de Materiales para Constructora</h1>

    <form action="agregar.php" method="POST">
        <label for="nombre">Nombre del Material:</label>
        <input type="text" name="nombre" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required><br>

        <label for="unidad">Unidad de Medida:</label>
        <input type="text" name="unidad" required><br>

        <button type="submit">Agregar Material</button>
    </form>

    <h2>Lista de Materiales</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->query("SELECT * FROM materiales");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                echo "<td>" . htmlspecialchars($row['unidad']) . "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $row['id'] . "'>Editar</a>
                        <a href='eliminar.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
