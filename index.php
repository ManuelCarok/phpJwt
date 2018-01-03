<?php
require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;

$time = time();
$key = 'prueba';

$token = array(
    'iat' => $time, // Tiempo que inició el token
    'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
    'data' => [ // información del usuario
        'id' => 1,
        'name' => 'Eduardo'
    ]
);

$jwt = JWT::encode($token, $key);

try {
    $data = JWT::decode($jwt, $key, array('HS256'));

    echo json_encode($jwt);
    echo json_encode($data);
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

?>