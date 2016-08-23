<?php
header('Content-type: text/json; charset=UTF-8');
if (count($_REQUEST)>0){
    require_once 'apiEngine.php';
    foreach ($_REQUEST as $apiFunctionName => $apiFunctionParams) {
        $APIEngine=new APIEngine($apiFunctionName,$apiFunctionParams);
        echo $APIEngine->callApiFunction(); 
        break;
    }
}else{
    $jsonError->error='No function called';
    print json_encode($jsonError);
}
?>
