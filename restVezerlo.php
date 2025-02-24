<?php

require_once("GamesrestKezelo.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];


switch($view){

	case "all":
		$Gamesrest = new GamesrestKezelo();
		$Gamesrest->getAllGames();
		break;
		
	case "single":
		$Gamesrest = new GamesrestKezelo();
		$Gamesrest->getGamesById($_GET["id"]);
		break;

	case "tipus":
		$Gamesrest = new GamesrestKezelo();
		$Gamesrest->getGamesByType($_GET["tid"]);
		break;
		
	default:
		$Gamesrest = new GamesrestKezelo();
		$Gamesrest->getFault();
}
?>
