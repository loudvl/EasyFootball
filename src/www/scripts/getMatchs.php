<?php
require_once("../db/database.php");
require_once("../scripts/EncodeJWT.php");

$query = Database::prepare("SELECT idMatch,idTeam1,idTeam2,team1Score,team2Score,stadium,matchState,startDateTime FROM easyfootball.match ORDER BY startDateTime DESC");
$query->execute();
echo EncodeJWT($query->fetchAll(PDO::FETCH_ASSOC));

?>