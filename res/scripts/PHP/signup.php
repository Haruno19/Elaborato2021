<?php   
    session_start();
    set_include_path(getcwd());

    require("DBConnect.php");

    $user = $_POST['user'];
    $pass = md5($_POST['password']);
	$cpass = md5($_POST['cpassword']);
    $mail = $_POST['mail'];
    $gen = $_POST['gen'];
    
 
    if($pass != $cpass)
    {
    	echo '<script>if(!alert("Le password non combaciano!")){window.location.href = "../../pages/signUpForm.php";}</script>';
    	exit();
    }
    
    if(strpos($mail,' ') || !strpos($mail,'.') || !strpos($mail,'@'))
    {
    	echo "<script>if(!alert(\"l'indirizzo email inserito sembra non essere corretto!\")){window.location.href = '../../pages/signUpForm.php';}</script>";
    	exit();
    }
    
    $query = "SELECT username
                FROM E_users ";

    $result = mysqli_query($conn,$query);
    while($tupla = mysqli_fetch_array($result))  
    {
        if($tupla["username"]==$user)
        {
            echo '<script>if(!alert("Username già in uso! Selezionarne un altro.")){window.location.href = "../../pages/signUpForm.php";}</script>';
            exit();
        }
    }
    
    

    $query = "INSERT INTO E_users
           (username, password, mail, gen) VALUES
            ('$user', '$pass', '$mail', '$gen') ";

    mysqli_query($conn,$query);
    
    $query = "SELECT idusrpk 
        FROM  E_users
        WHERE username = '$user'";

    $result = mysqli_query($conn,$query);
    $tuple = mysqli_fetch_array($result);

    $_SESSION['userid']=$tuple['idusrpk'];
    $_SESSION['username'] = $user;
    $_SESSION['logon'] = true;
    header("Location: ../../../home.php");
?>