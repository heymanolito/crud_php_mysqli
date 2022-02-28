<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de libros</title>
</head>
<body>
<nav style="text-align: center">
    <a href="GestionLibros.php">Atrás</a>
</nav>
<?php

    use Service\AutorService;
//    include Service\AutorService::class;
    require ('Service/AutorService.php');

    $tablaAutores = new AutorService();

echo '<h3 style="text-align: center">' . 'Autores' . '</h3>';
for ($i = 1; $i <= $tablaAutores->getSize() + 1; $i++) {

    echo '<div style="margin: 20px; 
                              padding: 20px;
                              border: solid 2px black">';
    $tablaAutores->getAuthorById($i);

    echo '</div>';
}

?>

?>

</body>
</html>
