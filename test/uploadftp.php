<?php
    $ftp_server = "files.000webhost.com";
    $ftp_user = "dfg6453424213414dswdf";
    $ftp_password = "Minhky@0211";


    // local file path and name
    $local_file = "../uploads/641716.mp4";

    // remote file path and name
    $remote_file = "./public_html/6418286203.mp4";

    // set up a connection or die
    $conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");

    // login with username and password or die
    ftp_login($conn_id, $ftp_user, $ftp_password) or die("Couldn't login as $ftp_user");

    
    // upload a file
    if (ftp_put($conn_id, $remote_file, $local_file, FTP_BINARY)) {

        $url = 'https://dfg6453424213414dswdf.000webhostapp.com' .'/'.$local_file;
        echo json_encode(array("status"=> true, "url"=> $url));
    } else {
        echo "Error uploading file!";
    }

    // close the FTP connection
    ftp_close($conn_id);
?>