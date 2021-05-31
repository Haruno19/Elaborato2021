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
                    $IdPar = $_GET['IdPar'];
                    
                    $query = " SELECT nome, descrizione, website, wiki, superficie 
                                FROM E_parchi
                                WHERE IdParPK = $IdPar";
                      
                    $result = mysqli_query($conn,$query);
                    $tupla = mysqli_fetch_array($result);
                    $nomePar = $tupla['nome'];
                    $desc = $tupla['descrizione'];
                    $website = $tupla['website'];
                    $wiki = $tupla['wiki'];
                    if($website=="")
                        $website='http://' . $_SERVER["HTTP_HOST"] . $_SERVER['PHP_SELF']."?IdPar=".$_GET['IdPar'];
                    if($wiki=="")
                        $wiki='http://' . $_SERVER["HTTP_HOST"] . $_SERVER['PHP_SELF']."?IdPar=".$_GET['IdPar'];
                    $sito = "<form action='$website' target='_blank' method='POST'>
                                <input type='submit' value='Visita il sito' style='width: 125px;'>
                            </form>";
                    $wiki = "<form action='$wiki' target='_blank' method='POST'>
                                <input type='submit' value='Visita la wiki' style='width: 125px;'>
                            </form>";
                    $superficie = $tupla['superficie'];

                    $query = "  SELECT R.nome
                                FROM E_regioni AS R, E_ParchiRegioni AS P
                                WHERE P.IdParFK = $IdPar AND
                                R.IdRegPK = P.IdRegFK";
                      
                    $result = mysqli_query($conn,$query);
                    $regioni="";
                    while($tupla = mysqli_fetch_array($result))
                    {
                        $regioni .= $tupla['nome'].",<br>";
                    }

                    $regioni=substr($regioni,0,strlen($regioni)-5);

                    $title = '<h1>'.$nomePar.'</h1><br>
                            <div class="CenterContent">
                            <form action="../../home.php">
                                 <input type="submit" value="Home">
                            </form></div>';
                    
					$Ldiv = "<div class='LeftContent'>
                                <img src=../images/parchi/$IdPar.png>
                                $sito $wiki <br><br>
                                <div style='margin-left:10%; margin-right:10%;'>
                                <h3 style='font-size: 16pt;'>$desc</h3>
                                </div>
                             </div>";
                    
                    $query = " SELECT R.inizio AS start, R.fine AS end, R.IdPerPK AS ID
                               FROM E_percorsi AS R, E_ParchiPercorsi AS P
                               WHERE R.IdPerPK = P.IdPerFK 
                               AND P.IdParFK = $IdPar
                               GROUP BY R.IdPerPK";

                    $select = "<select id='path' name='percorso' onchange='updatePath()' style='width:80%;'>
                                <option value='-' selected></option>";
                    $result = mysqli_query($conn,$query);
                    while($tupla = mysqli_fetch_array($result))
                    {
                        $IdPer = $tupla["ID"];
                        $start = $tupla["start"];
                        $end = $tupla['end'];
                        $select .= "<option value='".$IdPer."'>".$start." ⤏ ".$end."</option>";    
                    }
                    $select .= "</select><br><br>";
    
                    $Cdiv = "<div class='Path'>
                            <table style='width:85%;' > 
                                <tr>
                                    <td class='header' style=' font-size: 100%;'> Regione </td>
                                    <td class='header' style=' font-size: 100%;'> Estensione </td>
                                </tr>
                                <tr>
                                    <td style=' font-size: 100%;'> $regioni </td>
                                    <td style=' font-size: 100%;'> $superficie km² </td>
                                </tr>
                                </table><br>
                                <form action='foto.php'>
                            		<input type='submit' style='width:auto;' value='Sfoglia le foto degli utenti'>
                        		</form><br><br>
                                <h2 class='Path'>
                                    Seleziona un percorso: <br><br>
                                    $select
                                </h2>
                                <div id='disli'>
                                </div>
                            </div>";
                        
                    $Rdiv = '<div id="mappa" class="RightContent">
                                
                            </div>';
                
                    echo $title.$Ldiv.$Rdiv.$Cdiv;
                ?>
            </div>
        </div>
        <script src="../scripts/JavaScript/drag.js"></script>
    </body>
</html>
