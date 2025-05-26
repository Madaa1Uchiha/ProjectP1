<?php
session_set_cookie_params(0);
session_start();
if (isset($_SESSION['username']))
{
    header("Location:manage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/styles.css">
        <title>Login Page</title>
    </head>
    <body>
        <?php include 'header.inc'; ?>
        <form method="get" action="login.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>
        
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
        
            <input type="hidden" name="token" value="login_token">
            <input type="submit" value="Login">
        </form>
        <?php include 'footer.inc'; ?>
    </body>
</html>
<?php
require_once("settings.php");
if (isset($_GET['token']) && $_GET['token'] === 'login_token')
{
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    $password = mysqli_real_escape_string($conn, $_GET['password']);
    $sql = "SELECT * FROM LOGIN WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: manage.php");
        exit();
    } 
    else 
    {
        echo "Invalid username or password.";
    }
}