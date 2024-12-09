<?php
include 'db.php';

$query = "SELECT * FROM tareas ORDER BY fecha_creacion DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Gestor de Tareas  <br>  <br> <a href="tareas/agregar.php">Añadir Tarea</a>
    </h1>
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td>
                        <a href="tareas/editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="tareas/eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
