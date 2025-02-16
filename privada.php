<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Privada</title>
  <style>
  body {
    font-family: sans-serif;
    background-color: #d5d8dc ;
    color: #333;
  }


  h1 {
    color: #007bff;
  }


  form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 0 auto;
  }


  label {
    display: block;
    margin-bottom:  
 5px;
  }


  input[type="text"],
  input[type="tel"],
  input[type="email"],
  textarea,
  select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid  
 #ddd;
    border-radius: 4px;
    box-sizing: border-box;
  }


  input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;  


  }


  /* Estilos para el banner */
  #banner {
    text-align: right;
  }


  #banner img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    height: auto;
  }


  /* Estilos para los botones */
  .container {
    display: flex;           /* Activa flexbox para el contenedor */
    justify-content: center; /* Centra los elementos horizontalmente */
    flex-wrap: wrap;        /* Permite que los botones se ajusten en varias filas */
  }


  a.button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    text-decoration: none;
    color: #fff;
    background-color:rgb(139, 10, 10);
    border: none;  
    border-radius:  
 5px;
    cursor: pointer;  
 
    margin: 10px;           /* Espacio alrededor de cada botón */
    width: calc(25% - 20px); /* Ancho del 25% menos el margen */
    box-sizing: border-box;  /* Incluye el padding y border en el ancho */
  }


  a.button:hover {
    background-color: #0056b3;
  }
</style>

</head>
<body>
  <h1>Bienvenido a la gestion de empleados</h1>
  <p>Solo las personas autorizadas pueden ver este contenido.</p>
  <p>SELECCIONA INGRESAR PARA COMENZAR</p>
  <a href="index.php">Ingresar</a>
  <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
