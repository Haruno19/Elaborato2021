<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
    </head>
        <?php
            set_include_path(getcwd());
            include("../scripts/PHP/hour.php");
            echo "class='form'>";
        ?>
        <div id="cont" class="container">
            <nav id="nav">
                <div class="left">
                    <h2 class="clock">&nbsp;<?php echo date("Y/m/d")?></h2>
                </div>
                <div class="right">
                    <form action="../../home.php">
                        <input type="submit" value="Home">
                    </form>
                    &nbsp;
                </div>
                <div class="centered">
                    <h1>Ministero dell'Ambiente: Parchi Naturali</h1>
                </div>
            </nav>
            <hr>
            <div id="window">
                <div id="windowheader"><a class="close" href="../../home.php">&nbsp;●</a></div>
                <form id="center" action="../scripts/PHP/login.php" method="POST">
                    <br><h2>Accedi</h2><p>Inserisci le tue credenziali</p>
                    <input type="text" name="user" placeholder="Username"><br><br>
                    <input type="password" name="password" placeholder="Password"><br><br><br>
                    <input type="submit" value="Accedi">
                </form>
            </div>
        </div>
        <script src="../scripts/JavaScript/drag.js"></script>
    </body>
</html>
