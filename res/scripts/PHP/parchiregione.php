<?php
        $reg = $_POST['reg'];
        if($reg=='-')
        header('Location: ../../home.php');
        require("DBConnect.php");

        $query = " SELECT IdRegPK 
        FROM E_regioni
        WHERE nome='$reg'";

        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_array($result);
        $IdRegPK = $result['IdRegPK'];

        $query = "  SELECT P.IdParPK, P.nome 
        FROM  E_parchi AS P, E_ParchiRegioni AS R
        WHERE R.IdRegFK = $IdRegPK AND
        P.IdParPK = R.IdParFK";
        
        $result = mysqli_query($conn,$query);


        $table= "<table height=60%>";
        $i=0;
        while($tupla = mysqli_fetch_array($result))  
        {
        $nome = $tupla["nome"];
        $id = $tupla["IdParPK"];
        $path = 'res/images/parchi/'.$id.'.png';
        if($i==0)
            $table.="<tr>";
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
        $table.= "</table>";

        echo $table;

    ?>