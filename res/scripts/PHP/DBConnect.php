<?php
    $db_host = "127.0.0.1";
    $db_login = "";
    $db_pass = "";
    $database = "my_haruno";
    
    $conn = mysqli_connect("$db_host","$db_login","$db_pass");
    if(!$conn)
    {
        echo "<p>Errore di connessione col DB</p>";
        session_destroy();
        exit();
    }
    
    if(!mysqli_select_db($conn,$database))
    {
        echo "<p>Errore di selezione DB</p>";
        session_destroy();
        exit();
    }
?>