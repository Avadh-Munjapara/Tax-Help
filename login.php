<?php
include("database.php");
session_start();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "username/password is empty";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = pg_query($conn, "select * from logininfo where username='$username'");
        if ((pg_num_rows($result) > 0)) {
            $row = pg_fetch_object($result);
            if ($row->username == $username && password_verify($password, $row->password)) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                header("location: index.php");
                exit;
            };
        } else {
            echo "no user found!";
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
    <title>Login</title>
    <link rel="stylesheet" href="loginn.css">
</head>

<body background="background.jpg">
    <div class="both">
        <!-- <div class="header">
            <h2>TAX-Help</h2>
            <div class="header-links">
                <a href="register.php">Sign Up</a>
                <a href="mailto:">Contact Us</a>
            </div>
        </div> -->
        <div class="header">
            <h1 class="heading">TAX-Help</h1>
            <div class="header-links">
            <a href="mailto:">Contact Us</a>
            </div>
        </div>
        <div class="login">
            <h1>Login</h1>
            <p>Please Fill your Details to Login.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username">
                </div> <br>
                <div>
                    <label>Password</label>
                    <input type="password" name="password">
                </div> <br>
                <div>
                    <input type="submit" value="Login">
                </div>
                <p>If You Don't Have An Account, <a href="signup.php">Click Here To Sign Up</a>.</p>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>&copy; Tax Help. All rights reserved.</p>
    </div>
</body>

</html>