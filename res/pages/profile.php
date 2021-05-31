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
                    <form action="../scripts/PHP/logout.php">
                        <input type="submit" value="Logout">
                    </form>
                    &nbsp;
                </div>
                <div class="centered">
                    <h1>Ministero dell'Ambiente</h1>
                </div>
            </nav>
            <hr>
            <div class="CenterContent">
                <h1>Il tuo profilo</h1>
                <h3>Ciao, <?php session_start(); echo $_SESSION['username']?>!</h3><br><br>
                <?php
                    require("../scripts/PHP/DBConnect.php");
                    $UserId = $_SESSION['userid'];
                    $user = $_SESSION['username'];
                    
                    $query = " SELECT gen, mail 
                                FROM E_users
                                WHERE IdUsrPK = $UserId";
                    
                    $result = mysqli_query($conn,$query);
                    $tupla = mysqli_fetch_array($result);
                    $gen = $tupla['gen'];
                    $mail = $tupla['mail'];

                    $Ldiv = "<div class='LeftContent'>
                            <img src=../images/user/propic$gen.png class='propic'>
                            <h1>$user</h1>
                            <h3>$mail</h3><br><br>
                            <form>
                                <input type='submit' style='width:auto;' value='Condividi le tue esperienze'>
                            </form><br><br>
                            <a href='privacy.php'><h4>Visualizza l'informativa sulla privacy</h4></a>
                            </div>";

                    $query = " SELECT IdParFK 
                                FROM E_timbri
                                WHERE IdUsrFK = $UserId";
                    
                    $timbri="";
                    $result = mysqli_query($conn,$query);
                    while($tupla = mysqli_fetch_array($result))
                    {
                        $timbri.="-".$tupla['IdParFK']."- ";
                    }        
                    
                    $Cdiv = "<div class='timbri'>
                            <br><br>
                            <h1> I tuoi timbri </h1>
                            <h3>Ottieni timbri visitando i parchi su prenotazione!</h3><br><br>
                            <table> ";

                    $id=0;
                    for($i=0;$i<4;$i++)
                    {
                        $Cdiv.="<tr class='timbri'>";
                        for($k=0;$k<6;$k++)
                        {   
                            $id++;
                            $Cdiv.="<td class='timbri' onclick='location.href=\"./parco.php?IdPar=$id\";'>
                                <img src='../images/logo/$id.png' class='timbro' ";
                            if(strpos($timbri,"-".strval($id)."-") === false)
                                $Cdiv.="id='nonOttenuto'";
                            else
                                $Cdiv.="id='ottenuto'";
                            $Cdiv.= "></td>";
                        }
                        $Cdiv.="</tr>";
                    }

                    $Cdiv.="</table> </div>";

                    echo $Ldiv.$Cdiv;
                ?>
            </div>
        </div>
        <script src="../scripts/JavaScript/drag.js"></script>
    </body>
</html>
