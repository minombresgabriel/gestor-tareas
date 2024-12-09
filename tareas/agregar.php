<?php
include '../db.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $titulo = trim($titulo);
$descripcion = trim($descripcion);

if (empty($titulo)) {
    echo "El título es obligatorio.";
    exit;
}

    $query = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
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
    <title>Añadir Tarea</title>
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>
    <h1>Añadir Tarea</h1>
    <form action="" method="POST">
        <input type="text" name="titulo" placeholder="Título" required maxlength="25">
        <textarea name="descripcion" placeholder="Descripción" required maxlength="100"></textarea>
        <button type="submit">Añadir</button>
    </form>
</body>
</html>
