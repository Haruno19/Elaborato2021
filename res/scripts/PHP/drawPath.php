<?php
    require("DBConnect.php");
    $IdPer = $_POST['path'];
    if($IdPer == '-')
        exit();
    
    $query = " SELECT embed, distanza, dislivello
                FROM E_percorsi
                WHERE IdPerPK = $IdPer";
      
    $result = mysqli_query($conn,$query);
    $tupla = mysqli_fetch_array($result);
    $embed = $tupla['embed'];
    $dist = $tupla['distanza'];
    $disl = $tupla['dislivello'];

    $Rdiv= $embed.'<br><br><h3 style="text-align:left">Anteprima del percorso</h3>';
    $Rdiv.= '<br> <table style="width:75%"> 
                        <tr>
                            <td class="header"> Distanza </td>
                            <td class="header"> Dislivello </td>
                        </tr>
                        <tr>
                            <td> '.$dist.'km </td>
                            <td> '.$disl.'m </td>
                        </tr>
                        </table>';
    
    echo $Rdiv;
?>
