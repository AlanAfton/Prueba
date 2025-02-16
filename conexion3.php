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
    $empleado = mysqli_real_escape_string($conn, $_POST['empleado']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $vehiculo = mysqli_real_escape_string($conn, $_POST['vehiculo']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
    $horario = mysqli_real_escape_string($conn, $_POST['horario']);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO asignaciones (empleado, area, vehiculo, descripcion, fecha, horario) VALUES ('$empleado', '$area','$vehiculo','$descripcion', '$fecha','$horario')";
    if ($conn->query($sql) === TRUE) {
        echo "Actividad registrada correctamente";
    } else {
        echo "Error al insertar: " . $sql . "<br>" . $conn->error;
    }
}

// Consultar los datos y mostrarlos en una tabla
$sql = "SELECT * FROM asignaciones";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Asignaciones de Actividades</h2>";
    echo "<table>";
    echo "<tr><th>Empleado</th><th>Area</th><th>Vehiculo</th><th>Fecha</th><th>Horario</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["empleado"] . "</td>";
        echo "<td>" . $row["area"] . "</td>";
        echo "<td>" . $row["vehiculo"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td>" . $row["horario"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay asignaciones registradas";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>ASIGNACIONES REGISTRADAS</title>
</head>
<body>
<a href="index.php" class="button">REGRESAR A MENU PRINCIPAL</a>
</body>
</html>