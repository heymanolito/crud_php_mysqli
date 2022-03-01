<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de libros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav style="text-align: center">
    <a href="GestionLibros.php">Atrás</a>
</nav>
<?php
use Service\LibroService;

require ('Service/LibroService.php');

$tablaLibros = new LibroService();

    echo '<h3 style="text-align: center">' . 'Libros' . '</h3>';

for ($i = 1; $i <= $tablaLibros->getSize(); $i++) {

    echo '<div style="margin: 20px; 
                              padding: 20px;
                              border: solid 2px black">';
    $tablaLibros->getBookById($i);

    echo '</div>';
}



?>

</body>
</html>