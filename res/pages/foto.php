<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script> 
        <script>    
            function updatePath(){
                    var pathID = $('#path').val();
                    var data = {path:pathID}; 
                    $('#mappa').load("../scripts/PHP/drawPath.php", data); 
                    $('#disli').load("../scripts/PHP/dislivello.php", data);
            }
        </script>
    </head>
        <?php
            set_include_path(getcwd());
            include("../scripts/PHP/hour.php");
            echo ">";
        ?>
        <div id="cont" class="container">
            <nav>
                <div class="left">
                    <h2 class="clock">&nbsp;<?php echo date("Y/m/d")?></h2>
                </div>
                <?php
                    include("../scripts/PHP/topMenu.php");
                ?>
                <div class="centered">
                    <h1>Ministero dell'Ambiente</h1>
                </div>
            </nav>
            <hr>
            <div class="CenterContent" style="overflow: auto;">
                <?php
                    require("../scripts/PHP/DBConnect.php");
                    
                ?>
            </div>
        </div>
        <script src="../scripts/JavaScript/drag.js"></script>
    </body>
</html>
