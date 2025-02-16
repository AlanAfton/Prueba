<?php
session_start();

// Credenciales de usuario
$usuario_valido = "admin";
$contrasena_valida = "1234";

// Recibir datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar credenciales
if ($username === $usuario_valido && $password === $contrasena_valida) {
    // Guardar autenticación en sesión
    $_SESSION['autenticado'] = true;
    header("Location: privada.php");
    exit();
} else {
    // Mostrar mensaje de error y redirigir de vuelta al login
    echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='login.html';</script>";
    exit();
}
?>
