<?php   
    session_start();
    
   require("DBConnect.php");
    $_SESSION['username'] = $_POST['user'];   
    $_SESSION['logon'] = true;
    $user = $_SESSION['username'];
    $pass = $_POST['password'];

    $query = "  SELECT username, password, idusrpk
            FROM  E_users
            WHERE username = '$user'";

    $result = mysqli_query($conn,$query);
    $tuple = mysqli_fetch_array($result);
    if($tuple['username'] == $user)
    {
        if($tuple['password'] == md5($pass))
        {
        		$_SESSION['userid']=$tuple['idusrpk'];
                header("Location: ../../../home.php");
                exit();
        }else{
                echo '<script>if(!alert("Password errata!")){window.location.href = "../../pages/loginForm.php";}</script>';
                session_destroy();
                exit();
        }
    }else{
       	echo '<script>if(!alert("Username errato!")){window.location.href = "../../pages/loginForm.php";}</script>';
        session_destroy();
        exit();
    }

?>