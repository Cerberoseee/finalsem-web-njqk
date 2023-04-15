<?php
    require_once('./components/layout.php');
    if(isset($_SESSION["account"])){
        unset($_SESSION["account"]);
        header("Location: index.php");  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Layout</title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container mt-4"> 
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>