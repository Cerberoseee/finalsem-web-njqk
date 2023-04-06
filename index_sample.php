<?php
    $videoID = '641711';
    $file_path = '';
    $title = "Homepage";
    $thumb = "";
    function fetchData($id){
        $server = $_SERVER['HTTP_HOST'];
        $api = "http://$server/Youtube/API/get-video.php?video=$id";
        $data = file_get_contents($api);
        $data = json_decode($data, true);

        return $data;
    }

    if(isset($_GET['video'])){
        $videoID = $_GET['video'];
        
        $video = fetchData($videoID); 
        $file_path = $video['url'];
        $title = $video['name'];
        $thumb = $video['thumbUrl'];
    }else{
        $video = fetchData($videoID); 
        $file_path = $video['url'];
        $title = $video['name'];
        $thumb = $video['thumbUrl'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container">
        
        <div class="content-video">
            <video id="player" poster="<?=$thumb?>">
                    <source src="<?=$file_path?>" type="video/mp4">
            </video>
        </div>
        <div class="upload">
            <a href="./uploadVideo.html">Upload video to database</a>
        </div>
        <div class="upload">
            <label for="">Import video from local to watch</label>
            <input id="video-file" type="file" />
        </div>
        <div class="list-video">
        </div>
    </div>
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/main.js">
    </script>
    <script src="./assets/js/upload.js"></script>
    <script src="./assets/js/fetch.js"></script>
</body>
</html>
