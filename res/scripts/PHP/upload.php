<?php
if (isset($_FILES['myfile'])) {
    if (filesize($_FILES['myfile']['tmp_name'])) 
    { 
        move_uploaded_file($_FILES['myfile']['tmp_name'], '../../images/user_uploads/'.$_FILES["myfile"]['name']);
        header("location: ../../pages/foto.php");
    } else {
        header("location: ../../pages/profile.php");
    	exit();
    }
}
?>