<?php
// Conexión a la base de datos (ajusta los datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csc_mx";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del empleado enviado desde el formulario
$IdEmpleado = $_POST['IdEmpleado'];

// Preparar y ejecutar la consulta SQL para eliminar el empleado
$sql = "DELETE FROM empleados WHERE IdEmpleado = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $IdEmpleado);

if ($stmt->execute()) {
    echo "Empleado eliminado exitosamente.";
} else {
    echo "Error al eliminar el empleado: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
