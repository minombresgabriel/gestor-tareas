<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tareas WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $tarea = $result->fetch_assoc();
    } else {
        echo "Tarea no encontrada.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    $titulo = trim($titulo);
$descripcion = trim($descripcion);

if (empty($titulo)) {
    echo "El título es obligatorio.";
    exit;
}

    $query = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion', estado = '$estado' WHERE id = $id";

    if ($conn->query($query)) {
        header("Location: ../index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>
    <h1>Editar Tarea</h1>
    <form action="" method="POST">
        <input type="text" name="titulo" value="<?php echo $tarea['titulo']; ?>" required>
        <textarea name="descripcion"><?php echo $tarea['descripcion']; ?></textarea>
        <select name="estado">
            <option value="pendiente" <?php if ($tarea['estado'] == 'pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="completada" <?php if ($tarea['estado'] == 'completada') echo 'selected'; ?>>Completada</option>
        </select>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
