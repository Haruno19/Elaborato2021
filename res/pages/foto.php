<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
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
            include("../scripts/PHP/hour.php");
            echo ">";
        ?>
        <div id="cont" class="container">
            <nav>
                <div class="left">
                    <h2 class="clock">&nbsp;<?php echo date("d/m/Y")?></h2>
                </div>
                <?php
                    include("../scripts/PHP/topMenu.php");
                ?>
                <div class="centered">
                    <h1>Ministero dell'Ambiente</h1>
                </div>
            </nav>
            <hr>
            <div class="CenterContent" style="width:96.5vw">
                <h1>Foto caricarte dagli utenti</h1><br>
                <form action="../../home.php">
                        <input type="submit" value="Home">
                </form>
                <?php
                    require("../scripts/PHP/DBConnect.php");
					$path = "../images/user_uploads/";
                    $dh = opendir($path);
                        
                    $query = "  SELECT IdParPK, nome 
                                FROM  E_parchi";
                    
                    $result = mysqli_query($conn,$query);

                    $table= "<div class='TableContainer' id='tab'> 
                                <table height=60%>";
                    $i=0;
                    while (($file = readdir($dh)) !== false) 
                    {
                        if(strpos($file,'.png') || strpos($file,'.jpg') || strpos($file,'.jpeg') ||
                        	strpos($file,'.PNG') || strpos($file,'.JPG') || strpos($file,'.JPEG'))
                        {
                        	$path = '../images/user_uploads/'.$file;
                        	if($i==0)
                           		$table.= "<tr>";
                        	$table.= '<td background="'.$path.'" class="foto"></td>';
                        	if($i++==3)
                        	{
                            	$table.= "</tr>";
                            	$i=0;
                       		}
                        }
                    }
                    $table.= "</table></div>";

                    echo $table;
                ?>
            </div>
        </div>
    </body>
</html>
