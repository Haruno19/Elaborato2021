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
                    <h1 id="console">Ministero dell'Ambiente</h1>
                </div>
            </nav>
            <hr>
            <div id="window">
                <div id="windowheader"><a class="close" href="../../home.php">&nbsp;●</a></div>
                <form id="center" action="../scripts/PHP/signup.php" method="POST">
                    <br><h2>Registrati</h2><p>Inserisci i campi richiesti</p>
                    <input type="text" name="user" placeholder="Username" required><br><br>
                    <input type="text" name="mail" placeholder="Indirizzo email" required><br><br>
                    <select name="gen" style="width: 60%;">
                        <option value="M">Maschio</option>
                        <option value="F">Femmina</option>
                    </select><br><br>
                    <input type="password" name="password" placeholder="Password" required><br><br>
                    <input type="password" name="cpassword" placeholder="Conferma password" required><br><br><br>
                    <input type="submit" value="Registrati">
                </form>
            </div>
        </div>
        <script src="../scripts/JavaScript/drag.js"></script>
    </body>
</html>
