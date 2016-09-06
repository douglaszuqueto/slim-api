<?php

$app->add(new \Slim\Middleware\JwtAuthentication([
    "header" => "Bearer",
    "secret" => getenv("JWT_SECRET"),
    "error" => function ($request, $response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));