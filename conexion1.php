<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csc_mx";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $rol = mysqli_real_escape_string($conn, $_POST['rol']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);
    $fecha_contratacion = mysqli_real_escape_string($conn, $_POST['fecha_contratacion']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO empleados (nombre, apellidos, rol, area, telefono, correo, direccion, fecha_contratacion, estado) VALUES ('$nombre', '$apellidos', '$rol', '$area', '$telefono', '$correo', '$direccion', '$fecha_contratacion', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo empleado registrado correctamente";
    } else {
        echo "Error al insertar: " . $sql . "<br>" . $conn->error;
    }
}

// Consultar los datos y mostrarlos en una tabla
$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Empleados</h2>";
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Apellidos</th><th>Rol</th><th>Area</th><th>Telefono</th><th>Correo</th><th>Direccion</th><th>Fecha de Contratacion</th><th>Estado</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellidos"] . "</td>";
        echo "<td>" . $row["rol"] . "</td>";
        echo "<td>" . $row["area"] . "</td>";
        echo "<td>" . $row["telefono"] . "</td>";
        echo "<td>" . $row["correo"] . "</td>";
        echo "<td>" . $row["direccion"] . "</td>";
        echo "<td>" . $row["fecha_contratacion"] . "</td>";
        echo "<td>" . $row["estado"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay empleados registrados";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>EMPLEADOS REGISTRADOS</title>
</head>
<body>
<a href="index.php" class="button">REGRESAR A MENU PRINCIPAL</a>
</body>
</html>
