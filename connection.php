<?php

$conn = mysqli_connect("localhost","root","","simpleworkout");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
/*
function getConnection() {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbn = "simpleworkout";

    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbn);
    return $conn;
}
*/
?>