<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de Git</title>
</head>

<body>

    <h1>Curso de Git <?= "Hola" ?> </h1>

    <h3>Temario del curso</h3>

    <ol>
        <li><a href="curso/1.html">Introduccion</a></li>
        <li>Inicializar repositorio</li>
        <li>Seguimiento de archivos</li>
        <li>Historial de cambios</li>
        <li>Deshacer cambios y etiquetas</li>
        <li>Ramas</li>
        <li>Git Cliente-Servidor</li>
        <li>GitHub</li>
        <li>Repositorios remotos y exclusión de archivos</li>
        <li>Proyecto final</li>
    </ol>

    <a href="<?= htmlspecialchars($_SERVER["PATH_TRANSLATE"].'/contacto.php') ?>">Contactanos</a>

    <hr>

    <?php
    $mysqli = new mysqli("mysql", "root", "1234", "curso_git", 3306);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->host_info . "<br>";

    $result = $mysqli->query("SELECT * FROM message_history");
    while ($row = $result->fetch_assoc()) {
        echo " message{ " . $row['id'] . ", " . $row["name"] . ", " . $row["email"] . ", " . $row["message"] . "} <br>";
    }
    ?>

</body>

</html>