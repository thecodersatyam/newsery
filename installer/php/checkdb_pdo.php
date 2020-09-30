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

    $pdo_drivers = PDO::getAvailableDrivers();
    
    foreach($pdo_drivers as $pdo_driver) {
        try {
            $conn = new PDO($pdo_driver.':host='.$param['host'].';dbname='.$param['name'], $param['username'], $param['password']);
        } catch (PDOException $e) {
            
        }
    }

?>