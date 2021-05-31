<html>
    <head>
        <link rel="stylesheet" href="res/css/style.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script> 
        <script>    
            function updateTab()
            {
                var regID = $('#reg').val();
                if(regID == '-')
                    location.reload();
                var data = {reg:regID}; 
                $('#tab').load("res/scripts/PHP/parchiregione.php", data); 
            }
        </script>
        
    </head>
        <?php
            set_include_path(getcwd());
            include("res/scripts/PHP/hour.php");
            echo ">";
        ?>
        <div id="cont" class="container">
            <nav>
                <div class="left">
                    <h2 class="clock">&nbsp;<?php echo date("d/m/Y")?></h2>
                </div>
                <?php
                    include("res/scripts/PHP/topMenu.php");
                ?>
                <div class="centered">
                    <h1>Ministero dell'Ambiente</h1>
                </div>
            </nav>
            <hr>
            <div class="CenterContent">
                <h1>Parchi Nazionali</h1>
                <h3>Seleziona un parco</h3><br><br>
                <?php
                    require("res/scripts/PHP/DBConnect.php");
                    
                    $query = " SELECT nome 
                                FROM E_regioni
                                ORDER BY nome";

                    $select = "<select id='reg' name='regione' onchange='updateTab()'>";
                    $select .= "<option value='-' selected>Tutti</option>";
                    $result = mysqli_query($conn,$query);
                    while($tupla = mysqli_fetch_array($result))
                    {
                        $reg = $tupla["nome"];
                        $select .= "<option value='".$reg."'>".$reg."</option>";    
                    }
                    $select .= "    </select>";

                    $query = "  SELECT IdParPK, nome 
                                FROM  E_parchi";
                    
                    $result = mysqli_query($conn,$query);

                    $table= "<div class='TableContainer' id='tab'> 
                                <table height=150%>";
                    $i=0;
                    while($tupla = mysqli_fetch_array($result))  
                    {
                        $nome = $tupla["nome"];
                        $id = $tupla["IdParPK"];
                        $path = 'res/images/parchi/'.$id.'.png';
                        if($i==0)
                            $table.= "<tr>";
                        $table.= '<td style=\'background: linear-gradient(rgba(0,0,0,.6), 
                            rgba(0,0,0,.6)), url("'.$path.'") no-repeat center; 
                            background-size: cover; -webkit-background-size: cover; 
                            -moz-background-size: cover; -o-background-size: cover;\'
                            onclick="window.location.href = \'res/pages/parco.php?IdPar='.$id.'\'">'.$nome.'</td>';
                        if($i++==3)
                        {
                            $table.= "</tr>";
                            $i=0;
                        }
                    }
                    $table.= "</table></div>";

                    echo $select;
                    echo $table;
                ?>
            </div>
        </div>
        <script src="./res/scripts/JavaScript/drag.js"></script>
    </body>
</html>
