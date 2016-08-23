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

    //--POST--

?>
