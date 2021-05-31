<?php
    require("DBConnect.php");
    $IdPer = $_POST['path'];
    if($IdPer == '-')
        exit();
      
    echo "<img src=../images/paths/$IdPer.png class='disli'>";
?>