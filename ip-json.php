<?php
header('Content-Type: application/json');

// Obtiene la dirección IP del usuario
function getUserIP() {
    // Verifica si la IP es pasada a través de un proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Crea un array con la IP
$response = array(
    'ip' => getUserIP()
);

// Devuelve la respuesta en formato JSON
echo json_encode($response);
?>
