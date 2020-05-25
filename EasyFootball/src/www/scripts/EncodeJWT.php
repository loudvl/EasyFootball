<?php
require_once '../vendors/autoload.php';
use \Firebase\JWT\JWT;

const KEY = "Super";

function EncodeJWT($values)
{
    $jwt = JWT::encode($values, KEY);
    return $jwt;
}
?>