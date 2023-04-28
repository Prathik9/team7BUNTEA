<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name)&& !empty($password) && !is_numeric($user_name))
        {
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        }
        else 
        {
            echo " please enter valid information";
        }
    }
?>

<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body background="3607424.jpg">
        <div class="form">
            <form method="post">
            <h2>SIGN UP HERE</h2>
            <input id="text" type="text" name="user_name" placeholder="Enter Email Here">
            <input id="text" type="password" name="password" placeholder="Enter Password Here">
            <button class="btnn" id="button" type="submit" value="signup">Signup</button><br><br>
            <p class="link"> <a href="login.php">Login here</a></p>
            </form>
        </div>
    </body>
</html>