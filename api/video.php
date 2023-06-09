<?php
    require_once('db-connection.php');

    // Get video from db
    if(isset($_GET["id"])){
        $videoID = $_GET["id"];
        
        $isLogin = false;
        if(isset($_SESSION["account"])){
            $isLogin = true;
            $account = $_SESSION['account'];
            $userID = $account["userId"];
            $cm = "INSERT INTO user_history(userId, videoId) VALUES (?, ?)";
    
            $exec = $dbCon -> prepare($cm);
            $exec -> bind_param("ss", $videoID, $userID);
            //In case of execution failed
            if (!$exec -> execute()) {
              die(json_encode(array("status" => false, "data" => "Execute query failed")));
            }
        }
        $cm = "UPDATE video SET views = views + 1 WHERE videoId = ?";

        $exec = $dbCon -> prepare($cm);
        $exec -> bind_param("s", $videoID);

        //In case of execution failed
        if (!$exec -> execute()) {
          die(json_encode(array("status" => false, "data" => "Execute query failed")));
        }

        $cm = "SELECT * FROM video 
          JOIN video_channel ON video.videoId = video_channel.videoId 
          JOIN users_account ON video_channel.userId = users_account.userId 
        WHERE video.videoId = ? ";
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