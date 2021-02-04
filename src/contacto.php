<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $mysqli = new mysqli("mysql", "root", "1234", "curso_git", 3306);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->host_info . "<br>";

    // define variables and set to empty values
    $nameError = $emailError = "";
    $name = $email = $message = "";
    $is_success = true;

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["nombre"])) {
            $nameError = "El nombre es obligatorio";
            $is_success = false;
        } else {
            $name = test_input($_POST["nombre"]);
        }

        if (empty($_POST["correo"])) {
            $emailError = "El email es obligatorio";
            $is_success = false;
        } else {
            $email = test_input($_POST["correo"]);
        }

        $message = test_input($_POST["mensaje"]);


        if ($is_success) {
            if (!($query = $mysqli->prepare("INSERT INTO message_history (name, email, message) VALUES (?, ?, ?)"))) {
                echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
            }

            if (!$query->bind_param("sss", $name, $email, $message)) {
                echo "Falló la vinculación de parámetros: (" . $query->errno . ") " . $query->error;
            }

            if (!$query->execute()) {
                echo "Falló la ejecución: (" . $query->errno . ") " . $query->error;
            }
        }
    }

    
    ?>

    <h1>Contactanos</h1>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" autocomplete="off">
        Nombre <input type="text" id="nombre" name="nombre" />
        <span class="error">* <?php echo $nameError; ?></span>
        <br />
        Correo <input type="email" id="correo" name="correo" />
        <span class="error">* <?php echo $emailError; ?></span>
        <br />
        Mensaje <textarea id="mensaje" name="mensaje"></textarea>
        <br />
        <button id="enviar" name="enviar">Enviar</button>
    </form>

    <a href="<?= htmlspecialchars($_SERVER["PATH_TRANSLATE"] . '/index.php') ?>">Regresar</a>

    <?php
    $result = $mysqli->query("SELECT * FROM message_history");
    while ($row = $result->fetch_assoc()) {
        echo print_r($row) . "<br>";
    }
    ?>

</body>

</html>