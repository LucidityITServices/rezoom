<?
if($_POST['submit']=="submit") {
    include("login-info.php");
    $link = new mysqli($host, $user, $pass, $db);

    if (!$link) {
        /*echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;*/
        exit;
    }

    /*
    echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;*/

    $query = "SELECT COUNT(*) FROM tblUsers WHERE username='".$_POST['username']."'";
    $result = $link->query($query);

    if($result->num_rows==1) {
        $error = "That username is already in use.";
    }
    else { 
        $query = "INSERT INTO tblUsers (username,`password`) VALUES ('".$_POST['username']."','".password_hash($_POST['password'],PASSWORD_DEFAULT)."');";
        $result = $link->query($query);
    }

    mysqli_close($link);
}
?>

<html>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
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
    <?php
        if(strlen($error)) { echo $error; }
    ?>
    <form action="#" method="post">
        <input type="text" value="" name="username" id="username">
        <input type="text" value="" name="password" id="password">
        <button name="submit" value="submit">Submit</button>
    </form>
</body>
</html>