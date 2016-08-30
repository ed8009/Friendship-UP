<?php
class api extends apiBaseClass {

	//---GET---
	function printTestMessage() {
		$retJSON = $this->createDefaultJson();  
		$retJSON->message = "Test message";
		return $retJSON;
	}

	function getUsers() {
		$retJSON = $this->createDefaultJson();          
		$query = "SELECT * FROM users";           
		$retJSON = $this->dbExecutor($query);
		return $retJSON;
	}

	//--POST--

	function getLikeUserWithID($apiMethodParams) {
		$retJSON = $this->createDefaultJson();  
		if (isset($apiMethodParams->userID)){
		$query = "SELECT likeUsers.choiceID FROM users, likeUsers WHERE users.id = $apiMethodParams->userID and users.id = likeUsers.userID";           
		$retJSON = $this->dbExecutor($query);
		}
		else {
			$retJSON->error=  APIConstants::ERROR_PARAMS;
		}
		return $retJSON;
	}

	function getUserVkById($apiMethodParams) {
		$retJSON = $this->createDefaultJson();  
		if (isset($apiMethodParams->userID)){         
			$query = "SELECT idVK FROM users WHERE id = $apiMethodParams->userID";           
			$retJSON = $this->dbExecutor($query);
		}
		else {
			$retJSON->error=  APIConstants::ERROR_PARAMS;
		}
		return $retJSON;
	}

	function getUserIDByVKId($apiMethodParams) {
		$retJSON = $this->createDefaultJson();  
		if (isset($apiMethodParams->userVK)){         
			$query = "SELECT id FROM users WHERE idVK = $apiMethodParams->userVK";           
			$retJSON = $this->dbExecutor($query);
		}
		else {
			$retJSON->error=  APIConstants::ERROR_PARAMS;
		}
		return $retJSON;
	}

//обновление/сохранение токена () ""
	function saveUserTokenById($apiMethodParams) {
		$retJSON = $this->createDefaultJson();  
		if (isset($apiMethodParams->idVK) && isset($apiMethodParams->token)){ 

			$queryCountUser = "SELECT id FROM users WHERE idVK = $apiMethodParams->idVK";
			$result = $this->dbExecutor($queryCountUser);

			if (count($result) > 0) {
    			$query = "UPDATE users SET token = '$apiMethodParams->token' WHERE idVK = '$apiMethodParams->idVK'";	
				$retJSON = $this->dbWriter($query);
    		}
    		else {
    			$retJSON->error = APIConstants::ERROR_RECORD_NOT_FOUND;
    		}	
		}
		else {
			$retJSON->error = APIConstants::ERROR_PARAMS;
		}
		return $retJSON;
	}

	function getTokenByUserIdVK($apiMethodParams) {
		$retJSON = $this->createDefaultJson();  
		if (isset($apiMethodParams->idVK)){         
			$query = "SELECT token FROM users WHERE idVK = $apiMethodParams->idVK";           
			$retJSON = $this->dbExecutor($query);
		}
		else {
			$retJSON->error=  APIConstants::ERROR_PARAMS;
		}
		return $retJSON;
	}
}
?>
