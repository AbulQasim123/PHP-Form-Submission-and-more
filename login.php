<?php
    session_start();
    include 'connect.php';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $username= validate($_POST['username']);
    $password= validate($_POST['password']);
    $error="";
    if (empty($username)) {
        header("location: index_form.php?u");
        exit();
    }else if(empty($password)){
        header("location: index_form.php?p");
        exit();
    }
    $sql = "SELECT * FROM `login` WHERE `username`= '{$username}' and `password`= '{$password}' ";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) === 1){
       $output = mysqli_fetch_assoc($result);
        if($output['username'] == $username and $output['password'] == $password) {
        //    echo "logged in";
            $_SESSION['user_id'] = $output['id'];
            $_SESSION['user_name'] = $output['username'];
            header("location: dashboard.php");
            exit();
        }
    }else{
        header("location: index_form.php?e");
        // echo "invalid credential";
    }
    
    

    
?>