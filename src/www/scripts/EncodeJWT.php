<?php
require_once '../vendor/autoload.php';
use \Firebase\JWT\JWT;

const KEY = "Super";

function EncodeJWT($values)
{
    $jwt = JWT::encode($values, KEY);
    return $jwt;
}
?>