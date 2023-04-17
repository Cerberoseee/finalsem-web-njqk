<?php
    /*
        - userID
        - GET METHOD
    */
    require_once("db-connection.php");

    $userID = isset($_GET["userId"]) ? $_GET["userId"] : null;
    if($userID){
        $cm = "SELECT * FROM users where userId = ?";
        $exec = $dbCon -> prepare($cm);
        $exec -> bind_param("s", $userID);
        $exec -> execute();
        $result = $exec -> get_result();

        if(mysqli_num_rows($result) >= 1){
            $account = [];
            $cm = "SELECT * FROM users where userId = ?";
            $exec = $dbCon -> prepare($cm);
            $exec -> bind_param("s", $userID);
    
            //In case of execution failed
            if (!$exec -> execute()) {
                die(json_encode(array("status" => false, "data" => "Execute query failed")));
            }
    
            //Fetch data from database
            $result = $exec -> get_result();
            $data = $result -> fetch_assoc();
            unset($data["password"]);
    
            $account = $data;
            // Get data from users table
            $cm = "SELECT * FROM users_account where userId = ?";
            $exec = $dbCon -> prepare($cm);
            $exec -> bind_param("s", $userID);
            if (!$exec -> execute()) {
                die(json_encode(array("status" => false, "data" => "Execute query failed")));
            }
    
            $result = $exec -> get_result();
            $data = $result->fetch_assoc();
            unset($data["userId"]);
            $account += $data;
    
    
            // Get data from users_info table
            $cm = "SELECT * FROM users_info where userId = ?";
            $exec = $dbCon -> prepare($cm);
            $exec -> bind_param("s", $userID);
            
            if (!$exec -> execute()) {
                die(json_encode(array("status" => false, "data" => "Execute query failed")));
            }
    
            $result = $exec -> get_result();
            $data = $result->fetch_assoc();
            unset($data["userId"]);
    
            $account += $data;
    
            echo json_encode(array("status"=> true, "data" => $account));
        }else{
            echo json_encode(array("status"=> false, "data" => "userID is not exist or correct"));
        }
        
    }else{
        echo json_encode(array("status"=> false, "data" => "userID is not exist or correct"));
    }
?>