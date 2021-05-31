<?php
	require("DBConnect.php");
    $username= $_GET['usrName'];
    $parId= $_GET['parId'];
    
    $query = "SELECT idusrpk
            FROM  E_users
            WHERE username = '$username'";
    
    $result = mysqli_query($conn,$query);
    $tuple = mysqli_fetch_array($result);
    $usrId=$tuple['idusrpk'];
    
    $query = "INSERT INTO E_timbri
           (IdUsrFK, IdParFK) VALUES
            ($usrId, $parId) ";
            
	if(mysqli_num_rows($result)>0)
   		mysqli_query($conn,$query);
    
    header('Location: //marcaccioriccardo.altervista.org/booked.php');
?>