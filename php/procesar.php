<?php
require_once 'config.php';

// Validar que sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    die('Método no permitido');
}

// Sanitizar y validar
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
$email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// Validación estricta en backend
if (!$nombre || strlen(trim($nombre)) < 3 || !$email) {
    header('HTTP/1.1 400 Bad Request');
    echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='styles.css'></head><body><div class='container'><div class='card error-card'><h2>❌ Error de Validación</h2><p>Los datos enviados no son válidos. El nombre debe tener al menos 3 letras y el correo debe ser correcto.</p><a href='index.html' class='btn'>Volver al formulario</a></div></div></body></html>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Respuesta PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="card success-card">
            <h2>✅ Datos Recibidos en PHP</h2>
            <div class="data-display">
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Aplicación:</strong> <?php echo APP_NAME; ?></p>
            </div>
            <a href="index.html" class="btn">Volver al formulario</a>
        </div>
    </div>
</body>
</html>