<?php
include("database.php");
session_start();
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    if(empty($_POST["username"])|| empty($_POST["password"])){
        echo "username/password is empty";
    }
    else{
        $username=$_POST["username"];
        $result=pg_query($conn,"select * from logininfo where username='$username'");
        if(pg_num_rows($result)==0){
            $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
            pg_query($conn,"insert into logininfo (username,password) values('$username','$password')");
            $_SESSION["username"]=$username;
            header ("location: profile_fill.php");
        }
        else{
            header("location: login.php");
        }
       
    }
    pg_close($conn);    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <h1>Sign Up</h1>
        <p>Please Fill This Form To Create An Account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>    <br>
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div><br>
            <div>
                <label>Confirm Password</label>
             
            </div><br>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
