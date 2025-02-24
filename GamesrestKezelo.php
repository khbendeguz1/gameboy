<?php
require_once("restKezelo.php");
require_once("Games.php");

class GamesrestKezelo extends restKezelo {

    function getAllGames() {
        $games= new Games();
        $sorAdat=$games->getAllGames();
		if(empty($sorAdat)) {
			$statusCode = 404;
			$sorAdat = array('error' => 'No Games found!');		
		} else {
			$statusCode = 200;
		}

		$this ->setHttpFejlec($statusCode);
		$result["games"] = $sorAdat;
				
        // Válasz küldése JSON formátumban
        $response = $this->encodeJson($result);
        echo $response;
    }

    function getGamesById($id) {
        $games= new Games();
        $sorAdat=$games->getGamesById($id);
		if(empty($sorAdat)) {
			$statusCode = 404;
			$sorAdat = array('error' => 'No Games found by this id!');		
		} else {
			$statusCode = 200;
		}

		$this ->setHttpFejlec($statusCode);
		$result["GamesById"] = $sorAdat;
				
        // Válasz küldése JSON formátumban
        $response = $this->encodeJson($result);
        echo $response;
    }

    function getGamesByType($typename) {
        $games= new Games();
        $sorAdat=$games->getGamesByType($typename);
		if(empty($sorAdat)) {
			$statusCode = 404;
			$sorAdat = array('error' => 'No FishingRod by this Manufacturer found!');		
		} else {
			$statusCode = 200;
		}

		$this ->setHttpFejlec($statusCode);
		$result["GamesByType"] = $sorAdat;
				
        // Válasz küldése JSON formátumban
        $response = $this->encodeJson($result);
        echo $response;
    }

    function getFault()
        {
            $statusCode = 400;
            $this ->setHttpFejlec($statusCode);
            $sorAdat = array('error' => 'Bad Request!');
            $result["Fault"] = $sorAdat;
				
            // Válasz küldése JSON formátumban
            $response = $this->encodeJson($result);
            echo $response;
        }
    
    function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;        
    }    
}
?>
