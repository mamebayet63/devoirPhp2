<?php
// require_once( ROOT_PATH . "/data/data.php");
  
function jsonToarray(string $key=null) {
    $json = file_get_contents(ROOT_PATH . '/data/data.json');
    $data = json_decode($json, true);
    return $key=null?$data:$data[$key];
}

    function findAllClient(){
        return jsonToarray('clients');
    }