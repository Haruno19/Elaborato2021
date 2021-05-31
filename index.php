<html>
    <head>
        <link rel="stylesheet" href="res/css/style.css">   
    </head>
        <?php
            set_include_path(getcwd());
            include("res/scripts/PHP/hour.php");
            echo ">";
        ?>
        <div id="cont" class="container">
            <nav>
                <div class="left">
                    <h2 class="clock">&nbsp;<?php echo date("Y/m/d")?></h2>
                </div>
                <?php
                    include("res/scripts/PHP/topMenu.php");
                ?>
                <div class="centered">
                    <h1>&nbsp;</h1>
                </div>
            </nav>
            <hr>
            <div class="CenterContent" style="overflow: auto;">
                <br><h1 class="title">Ministero dell'Ambiente e della<br>Tutela del Territorio del Mare</h1>
                <br><br><img class="home" src="res/images/ministero.png">
                <h1 class="title1">Benvenuto!</h1><br>
                <h2 class="title">Tramite questo portale potrai visualizzare i <br>
                		Parchi Nazionali presenti sul territorio italiano<br>
                		e i relativi percorsi naturalistici.<br><br></h2>
                <form action="home.php">
                    <input class="title" type="submit" value="Esplora">
                </form>
                 <h4 class="title" style="margin-top:6%;">Si consiglia di attivare la modalità Schermo Intero (F11) per una migliore esperienza di navigazione.
                 </h4>
            </div>
        </div>
        <script src="./res/scripts/JavaScript/drag.js"></script>
    </body>
</html>
