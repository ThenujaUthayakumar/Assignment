<?php  
$con=mysqli_connect("localhost","root","");  //mysql connect
mysqli_select_db($con,"assignment");  //database connect

if ($con) { //check database connection correct or not 
        
    //echo "connected"; //correct ouput
}
else
{
    echo "error"; //wrong output
}
?>  