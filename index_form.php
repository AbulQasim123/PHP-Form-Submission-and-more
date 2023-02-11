<?php 
    
    $fullname = $email = $number = $age = $comment = $sex = "";
    $fullname_error = $email_error = $number_error = $age_error = $comment_error = $sex_error= "";
    if (isset($_POST['submit'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['fullname'])) {
                $fullname_error = "Please enter your name !";
            }else{
                $fullname = test_input($_POST['fullname']);
                $fullname_error="";
                if (!preg_match("/^[a-zA-Z]+$/", $fullname)) {
                    $fullname_error = "Only letter and white space allowed !";
                }
            }
            if (empty($_POST['email'])) {
                $email_error= "Plese enter email address !";
            }else{
                $email = test_input($_POST['email']);
                $email_error= "";
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error= "Please enter valid email address !";
                }
            }
            if (empty($_POST['number'])) {
                $number_error = "Please enter 10 Digit Mobile number !";
            }else{
                $number= test_input($_POST['number']);
            }
            if (empty($_POST['age'])) {
                $age_error = "Please enter your current age !";
            }else{
                $age = test_input($_POST['age']);
            }
            if (empty($_POST['comment'])) {
                $comment_error = "Pleae leave comment !";
            }else{
                $comment = test_input($_POST['comment']);
            }
            if (empty($_POST['sex'])) {
                $sex_error = "please provide about sex !";
            }else{
                $sex = test_input($_POST['sex']);
            }
        }
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<?php
        // Introduction to PHP Rest Api
    include 'connect.php';
    $response = array();
    if ($conn) {
        $sql= "SELECT * FROM `login`";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            $x = 0;
            while ($rows= mysqli_fetch_assoc($result)) {
                $x++;
                $response[$x]['id'] = $rows['id'];
                $response[$x]['username'] = $rows['username'];
                $response[$x]['password'] = $rows['password'];
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }else{
        echo "Database connection failed";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui-1.12.1\jquery-ui.min.css">
    <style>
        
        #form_container{
            border: 1px solid black;
            width: 400px;
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <h2 class="text-center">Form validation</h2>
        <form id="myform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fullname" class="font-weight-bold">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                        <span class="text-danger font-weight-bold">* <?php echo $fullname_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                        <span class="text-danger font-weight-bold">*<?php echo $email_error; ?></span>
                    </div>
                    <div class="form-gorup">
                        <label for="number" class="font-weight-bold">Number</label>
                        <input type="text" name="number" id="number" class="form-control">
                        <span class="text-danger font-weight-bold">*<?php echo $number_error; ?></span>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="age" class="font-weight-bold">Age</label>
                        <input type="text" name="age" id="age" class="form-control">
                        <span class="text-danger font-weight-bold">*<?php echo $age_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="comment" class="font-weight-bold">Comment</label>
                        <input type="text" name="comment" id="comment" class="form-control">
                        <span class="text-danger font-weight-bold">*<?php echo $comment_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="sex" class="font-weight-bold">Sex</label>
                        <input type="text" name="sex" id="sex" class="form-control">
                        <span class="text-danger font-weight-bold">*<?php echo $sex_error; ?></span>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
<?php 
    echo "<h3>Your output</h3>";
    echo '<b>'.$fullname.' ,&nbsp;&nbsp;'. $email. ' ,&nbsp;&nbsp;'. $number .' ,&nbsp;&nbsp;'. $age.' ,&nbsp;&nbsp;'. $comment .' ,&nbsp;&nbsp;'. $sex .'</b>';
?>
    
    <!-- How to make login form in php -->
    <h3 class="text-center">How to make login form in php.</h3>
    <div class="container" id="form_container">
        <div class="row" id="form_row">
            <div class="col-md-12">
            <h3 class="text-center">Login</h3>
            <?php 
                if (isset($_REQUEST['u'])) {
            ?>
            <p class="text-center font-weight-bold text-danger"><?php echo "Username is Required;" ?></p>
            <?php } ?>
                <?php 
                if (isset($_REQUEST['p'])) {
            ?>
            <p class="text-center font-weight-bold text-danger"><?php echo "Password is Required;" ?></p>
            <?php } ?>
            <?php 
                if (isset($_REQUEST['e'])) {
            ?>
            <p class="text-center font-weight-bold text-danger"><?php echo "Invalid credentials details"; ?></p>
            <?php } ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username" class="font-weight-bold">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <span id="error1" name="error"></span>
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                    <span id="error2" name="error"></span>
                </div>
                <button type="submit" id="login" name="login"  class="btn btn-primary btn-block">Login</button>
            </form>
            </div>
        </div>
    </div>
    <span></span>
            
    <script src="jquery\jquery.js"></script>
    <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1\jquery-ui.min.js"></script>
    <script>
        
    </script>
</body>
</html>
