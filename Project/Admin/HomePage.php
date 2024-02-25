<?php
    ob_start();
    include("Head.php"); 
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .bg-img
    {
        background-image: url("../adminbanner.jpg");
        background-size:cover;
        height: 100vh;
    }
</style>
<body>
    
    <div class="bg-img">

    </div>
    
    
</body>
</html>
<?php
    include("Foot.php");
    ob_flush(); 
    ?>