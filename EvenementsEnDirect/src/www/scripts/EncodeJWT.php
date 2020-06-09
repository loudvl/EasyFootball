<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once '../vendors/autoload.php';
use \Firebase\JWT\JWT;

const KEY = "Super";
//Encode a string into a JWT string, encrypting with KEY and return it
function EncodeJWT($values)
{
    $jwt = JWT::encode($values, KEY);
    return $jwt;
}
?>