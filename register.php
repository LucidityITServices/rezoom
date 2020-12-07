<?php
$error = "";
if($_POST['submit']=="submit") {
    include("login-info.php");
    $link = new mysqli($host, $user, $pass, $db);

    if (!$link) {
        echo "Something went wrong but we're on it." . PHP_EOL . "Go back to the <a href='https://rezoom.lucidity.net'>homepage</a>";
        exit;
    }

    $username = $_POST['username'];
    $query = "SELECT * FROM tblusers WHERE username='$username'";
    $result = $link->query($query);

    if($result->num_rows==1) {
        $error = "That username is already in use.";
    }
    else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO tblusers (username,`password`) VALUES ('$username','$password')";
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
    <?php include("nav.php"); ?>
    <form action="register.php" method="post">
        <label for="username">Username: <input type="text" class="form-control" value="" name="username" id="username"></label>
        <label for="password">Password: <input type="password" class="form-control" value="" name="password" id="password"></label>
        <button name="submit" class="btn btn-primary" value="submit">Submit</button>
    </form>
</body>
</html>