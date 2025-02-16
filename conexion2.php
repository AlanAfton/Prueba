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
    $actividad = mysqli_real_escape_string($conn, $_POST['actividad']);
    $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO actividades (actividad, fecha, descripcion, estado) VALUES ('$actividad', '$fecha', '$descripcion', '$estado')";
    if ($conn->query($sql) === TRUE) {
        echo "Actividad registrada correctamente";
    } else {
        echo "Error al insertar: " . $sql . "<br>" . $conn->error;
    }
}

// Consultar los datos y mostrarlos en una tabla
$sql = "SELECT * FROM actividades";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Actividades</h2>";
    echo "<table>";
    echo "<tr><th>Actividad</th><th>Fecha</th><th>Descripción</th><th>Estado</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["actividad"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "<td>" . $row["estado"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay actividades registradas";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>ACTIVIDADES REGISTRADAS</title>
</head>
<body>
<a href="index.php" class="button">REGRESAR A MENU PRINCIPAL</a>
</body>
</html>