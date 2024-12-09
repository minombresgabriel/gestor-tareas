<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tareas WHERE id = $id";

    if ($conn->query($query)) {
        header("Location: ../index.php");
    } else {
        echo "Error al eliminar la tarea: " . $conn->error;
    }
} else {
    echo "ID no proporcionado.";
}
?>
