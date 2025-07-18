<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Docker LAMP Stack</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; color: #333; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; border: 1px solid #ddd; }
        .status { padding: 10px; margin-top: 20px; border-radius: 4px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hola Mundo!</h1>
        <p>Esta es una aplicación PHP, corriendo dentro de un contenedor Docker.</p>

        <?php
        $db_host = getenv('DB_HOST');
        $db_name = getenv('MYSQL_DATABASE');
        $db_user = getenv('MYSQL_USER');
        $db_pass = getenv('MYSQL_PASSWORD');

        try {
            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            echo "<div class='status success'>Successfully connected to MySQL!</div>";

            $conn->close();

        } catch (Exception $e) {
            echo "<div class='status error'>Could not connect to database: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
</body>
</html>
