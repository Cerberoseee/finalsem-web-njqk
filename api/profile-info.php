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

            // History
            $cm = "SELECT * FROM user_history JOIN video ON user_history.videoId = video.videoId WHERE user_history.userId = ?";

            $exec = $dbCon -> prepare($cm);
            $exec -> bind_param("s", $userID);
    
            //In case of execution failed
            if (!$exec -> execute()) {
              die(json_encode(array("status" => false, "data" => "Execute query failed")));
            }

            $result = $exec -> get_result();
            $data_arr = [];
            while($row = $result->fetch_assoc()) {
              $data_arr[] = $row;
            }

            $account += array( "history" => $data_arr);

            // Playlist
            $cm = "SELECT * FROM video_playlist WHERE userId = ?";

            $exec = $dbCon -> prepare($cm);
            $exec -> bind_param("s", $userID);
    
            //In case of execution failed
            if (!$exec -> execute()) {
              die(json_encode(array("status" => false, "data" => "Execute query failed")));
            }

            $result = $exec -> get_result();
            $data_arr = [];
            while($row = $result->fetch_assoc()) {
              $cm = "SELECT * FROM playlist_detail WHERE playlistId = ?";
              $exec = $dbCon->prepare($cm);
              $exec -> bind_param("s", $row["playlistId"]);
            
              if (!$exec -> execute()) {
                die(json_encode(array("status" => false, "data" => "Execute query failed")));
              }
            
              $resultTemp = $exec -> get_result();
              $videosPlaylist = $resultTemp->num_rows;
              if($videosPlaylist >= 1){
                // Get first video
                $firstRow = $resultTemp->fetch_assoc();
                
                $row += array("count" => $videosPlaylist, "firstVideo"=> $firstRow["videoId"]);
              }else{
                $row += array("count" => 0);
              }
              
              $data_arr[] = $row;
            }

            
            $account += array( "playlist" => $data_arr);

            // Number of videos
            $cm = "SELECT COUNT(*) FROM video_channel WHERE video_channel.userId = ?";
            
            $exec = $dbCon->prepare($cm);
            $exec -> bind_param("s", $userId);
          
            if (!$exec -> execute()) {
              die(json_encode(array("status" => false, "data" => "Execute query failed")));
            }
          
            $result = $exec -> get_result();
            $data = $result->num_rows;
          
            $account += array( "videoCount" => $data);
          
            echo json_encode(array("status"=> true, "data" => $account));


        }else{
            echo json_encode(array("status"=> false, "data" => "userID is not exist or correct"));
        }
        
    }else{
        echo json_encode(array("status"=> false, "data" => "userID is not exist or correct"));
    }
?>