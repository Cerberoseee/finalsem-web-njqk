<?php
    require_once('./components/layout.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Video Page</title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container video-container mt-4">
        <?=videoTemplate()?>  
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>