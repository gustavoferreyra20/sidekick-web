<?php
// activate.php
$token = isset($_GET['token']) ? $_GET['token'] : null;
$success = false;
$title = "";
$subtitle = "";

if (!$token) {
    $title = "No se proporcionó ningún enlace de activación";
    $subtitle = "Asegúrate de abrir el link que te enviamos por correo.";
} else {
    $apiUrl = 'https://sidekick-server-nine.vercel.app/api/auth/activate-account?token=' . urlencode($token);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if (!$response) {
        $title = "No pudimos conectar con el servidor";
        $subtitle = "Intenta nuevamente más tarde.";
    } else {
        if ($httpCode == 200) {
            $success = true;
            $title = "Tu cuenta ha sido activada correctamente";
            $subtitle = "Tu cuenta está activa. Abre la aplicación para iniciar sesión.";
        } else if ($httpCode == 400) {
            $title = "Enlace inválido o expirado";
            $subtitle = "Solicita un nuevo enlace de activación.";
        } else {
            $title = "Error al validar el token";
            $subtitle = "Intenta nuevamente más tarde.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Activación de cuenta - SideKick</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #000000, #0f2027, #1a3c2f);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #fff;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 40px;
            max-width: 420px;
            width: 100%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6);
            animation: fadeIn 0.8s ease-in-out;
        }

        /* === Ajuste para mobile === */
        @media (max-width: 768px) {
            .card {
                width: 90%;       /* más ancho en móviles */
                max-width: 360px; /* asegura que no se pase demasiado */
                padding: 30px;    /* más espacio interno para texto */
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        h2 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #f5f5f5;
        }

        p {
            color: #ccc;
            font-size: 0.95rem;
        }

        .btn {
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(90deg, #2e7d62, #1b5e44);
            border: none;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(27, 94, 68, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #ddd;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="card">
    <div class="icon">
        <?php if ($success): ?>
            <i class="bi bi-check-circle-fill text-success"></i>
        <?php else: ?>
            <i class="bi bi-x-circle-fill text-danger"></i>
        <?php endif; ?>
    </div>

    <h2><?= $title ?></h2>
    <p><?= $subtitle ?></p>

    <a href="index.php" class="btn <?= $success ? 'btn-primary' : 'btn-secondary' ?> mt-3">
        <?= $success ? 'Ir al inicio' : 'Volver al inicio' ?>
    </a>
</div>

</body>
</html>
