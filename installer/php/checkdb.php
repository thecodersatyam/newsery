<?php

    require_once "../dictionary.php";

    $param = [];

    $params_name = ['username', 'password', 'host', 'name', 'prefix'];

    foreach ($params_name as $param_name) {
        if(isset($_POST[$param_name]))
            $param[$param_name] = $_POST[$param_name];
        else {
            http_response_code(500);
            exit("paramther-connection-error");
        }
    }

    $conn = new mysqli($param['host'], $param['username'], $param['password'], $param['name']);

    // TODO: https://www.doctrine-project.org/projects/doctrine-orm/en/current/tutorials/getting-started.html

    if($conn->connect_error) {
        http_response_code(500);
        exit($it["db_connetion_error"]);
    }

    $result = $conn->query("SHOW GRANTS FOR CURRENT_USER");

    if(!$result){
        http_response_code(500);
        exit($it["db_query_error"]);
    }

    $flag = true;
    foreach($result->fetch_all() as $rows){
        foreach($rows as $row){
            if(stristr($row, '*.*') || stristr($row, $param['name'].'.*')){

                if(!stristr($row, 'SELECT')){
                    //no select priv
                    $flag = false;
                }
                if(!stristr($row, 'INSERT')){
                    //no insert priv
                    $flag = false;
                }
                if(!stristr($row, 'UPDATE')){
                    //no insert priv
                    $flag = false;
                }
                if(!stristr($row, 'DELETE')){
                    //no insert priv
                    $flag = false;
                }
                if(!stristr($row, 'CREATE')){
                    //no insert priv
                    $flag = false;
                }
                if(!stristr($row, 'ALTER')){
                    //no insert priv
                    $flag = false;
                }
                if(!stristr($row, 'DROP')){
                    //no insert priv
                    $flag = false;
                }

                if(stristr($row, 'ALL PRIVILEGES')){
                    $flag = true;
                }
            }
        }
    }
    if($flag){
        $conn->close();
        exit("Permessi tutt'apposto!");
    }else{
        $conn->close();
        http_response_code(500);
        exit($it["db_invalid_perm"]);
    }

?>