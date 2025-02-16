<?php
// Conexión a la base de datos (ajusta los datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csc_mx";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$placas = $_POST['placas'];
$empleado = $_POST['empleado'];

// Insertar datos en la base de datos
$sql = "INSERT INTO autos (marca, modelo, anio, placas, empleado) VALUES ('$marca', '$modelo', '$anio', '$placas', '$empleado')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo auto registrado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>