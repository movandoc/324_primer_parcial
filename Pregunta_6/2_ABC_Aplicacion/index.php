<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="validar_login.php" method="post">
        <label for="correo">Usuario:</label><br>
        <input type="email" name="username" required><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" name="psw" required><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
