<?php

include("login-info.php");

if(isset($_SESSION['id'])) { 
    header('Location: https://rezoom.lucidity.net/');
}

if(isset($_POST['submit']) && $_POST['submit']=="submit") {
    $link = new mysqli($host, $user, $pass, $db);

    if (!$link) {
        error_log("Error: Unable to connect to MySQL.". date("m-d-y g:i a")); //mm-dd-yy hh:mm am/pm
        header('Location: /rezoom/404.htm');
        exit;
    }

    $query = "SELECT id,username FROM tblUsers WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
    $result = $link->query($query);

    if($result->num_rows==1) {
        session_start();
        while ($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
        }
        header('Location: /rezoom/main.php');
    }
    else {
        echo "Username and/or password incorrect.";
    }

    mysqli_close($link);
}
?>

<html>
<body>
    <header style="width:100%;" class="subpage-header">
        <nav style="display:flex; justify-content:space-between;">
            <a href="index.php">Home</a>
            <div>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
                <a href="faq.php">FAQ</a>
            </div>
        </nav>
    </header>
    <form action="#" method="post">
        <label for="username">Username</label><input type="text" value="" name="username" id="username">
        <label for="password">Password</label><input type="text" value="" name="password" id="password">
        <button name="submit" value="submit">Submit</button>
    </form>
</body>
</html>