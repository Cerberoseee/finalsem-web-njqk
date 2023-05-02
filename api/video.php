<?php
    require_once('db-connection.php');

    // Get video from db
    if(isset($_GET["id"])){
        $videoID = $_GET["id"];
        $cm = "SELECT * FROM video where videoId = ?";
        $exec = $dbCon -> prepare($cm);
        $exec -> bind_param("s", $videoID);

        //In case of execution failed
        if (!$exec -> execute()) {
            die(json_encode(array("status" => false, "data" => "Execute query failed")));
        }

        //Fetch data from database
        $result = $exec -> get_result();
        $data = $result -> fetch_assoc();

        echo json_encode(array("status" => true, "content" => $data));
    }else{
        echo json_encode(array("status" => false, "content"=> "Error in recognize with id"));
    }
?>