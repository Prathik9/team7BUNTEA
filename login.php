<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id']=$user_data['user_id'];
                        header("Location: home.php");
                        die;
                    }
                }   
            }
            
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
            <h2>Login Here</h2>
            <input id="text" type="text" name="user_name" placeholder="Enter UserName Here">
            <input id="text" type="password" name="password" placeholder="Enter Password Here">
            <button class="btnn" id="button" type="submit" value="Login">Login</button><br><br>
            <p class="link">Don't have an account?<br>
            <a href="signup.php">Sign up here</a></p>
</form>
        </div>
    </body>
</html>

