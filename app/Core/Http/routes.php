<?php

use Firebase\JWT\JWT;

$app->get('/', 'HomeController:index');

$app->get('/token', function($req, $res){
    $now = new DateTime();
    $future = new DateTime("now +2 hours");
    $jti = md5('admin');
    $payload = [
        "iat" => $now->getTimeStamp(),
        "exp" => $future->getTimeStamp(),
        "jti" => $jti
    ];
    $secret = getenv("JWT_SECRET");
    $token = JWT::encode($payload, $secret, "HS256");
    $data["status"] = "ok";
    $data["token"] = $token;
    return $res->withStatus(201)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});