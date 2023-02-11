<?php 
    $conn = mysqli_connect('localhost', 'root', '','php_project');
   
    if(!$conn){
        echo "not connected";
    }
?>