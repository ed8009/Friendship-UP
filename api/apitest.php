<?php

class api extends apiBaseClass {

//http://travel-app.ru/api/?apitest.helloworld={}
    function helloWorld() {
        $retJSON = $this->createDefaultJson();          
        $retJSON->message = "Hello World!";

        return $retJSON;
    }

    function helloAPI() {
        $retJSON = $this->createDefaultJson();          
        $query = "SELECT * FROM users";           
        $retJSON = $this->dbExecutor($query);
        return $retJSON;
    }

//http://travel-app.ru/api/?apitest.helloAPIWithParams={TestParamOne : Text of first parameter}
    function helloAPIWithParams($apiMethodParams) {
        $retJSON = $this->createDefaultJson();
        if (isset($apiMethodParams->TestParamOne)){
            //Все ок параметры верные, их и вернем
            $retJSON->message=$apiMethodParams->TestParamOne;
        }else{
            $retJSON->error=  APIConstants::ERROR_PARAMS;
        }
        return $retJSON;
    }

}

?>
