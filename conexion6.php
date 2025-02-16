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

// Obtener los datos del formulario
$IdEmpleado = $_POST['IdEmpleado'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$rol = $_POST['rol'];
$area = $_POST['area'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$fecha_contratacion = $_POST['fecha_contratacion'];
$estado = $_POST['estado'];
// ... Obtener los demás datos

// Preparar y ejecutar la consulta SQL para modificar los datos del empleado
$sql = "UPDATE empleados SET nombre = ?, apellidos = ?, rol = ?, area = ?, telefono = ?, correo = ?, direccion = ?, fecha_contratacion = ?, estado = ? WHERE IdEmpleado = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssi", $nombre, $apellidos, $rol, $area, $telefono, $correo, $direccion, $fecha_contratacion, $estado, $idEmpleado);

if ($stmt->execute()) {
    echo "Empleado modificado exitosamente.";
} else {
    echo "Error al modificar el empleado: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>