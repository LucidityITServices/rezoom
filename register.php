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
        $query = "INSERT INTO tblUsers (username,`password`) VALUES ('".$_POST['username']."','".password_hash($_POST['password'],PASSWORD_DEFAULT)."');";
        $result = $link->query($query);
    }

    mysqli_close($link);
}
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
    <form action="#" method="post">
        <label for="username">Username: <input type="text" class="form-control" value="" name="username" id="username"></label>
        <label for="password">Password: <input type="password" class="form-control" value="" name="password" id="password"></label>
        <button name="submit" class="btn btn-primary" value="submit">Submit</button>
    </form>
</body>
</html>