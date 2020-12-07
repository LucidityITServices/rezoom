<?
if($_POST['submit']=="submit") {
    include("login-info.php");
    $link = new mysqli($host, $user, $pass, $db);

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

    $query = "SELECT COUNT(*) FROM tblUsers WHERE username='".$_POST['username']."'";
    $result = $link->query($query);

    if($result->num_rows==1) {
        $error = "That username is already in use.";
    }
    else { 
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO tblUsers (username,`password`) VALUES ('$username','$password');";
        $result = $link->query($query) or die("reg failed");
        echo "Registration successful";
    }

    mysqli_close($link);
}
else { echo "???"; }
?>

<html>
<?php
		$title = "Rezoom - Sign Up";
		include("head.php");
	?>
<body>
    <?php
        include("nav.php");
        if(strlen($error)) { echo $error; }
    ?>
    <form action="register.php" method="post">
        <label for="username">Username: <input type="text" class="form-control" value="" name="username" id="username"></label>
        <label for="password">Password: <input type="password" class="form-control" value="" name="password" id="password"></label>
        <button name="submit" class="btn btn-primary" value="submit">Submit</button>
    </form>
</body>
</html>