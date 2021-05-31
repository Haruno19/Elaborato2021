<?php      
    $h = intval(date("H"));
    if($h>6 && $h<=9)
        $id="morning";
    else if($h>9 && $h<=17)
        $id="day";
    else if($h>17 && $h<=20)
        $id="evening";
    else if($h>20)
        $id="night";
    echo "<body id='".$id."'";
?>