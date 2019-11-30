<?php

if(isset($_SESSION['id'])) {
    header('Location: http://www.rezoom.com/');
}

if(isset($_POST['submit']) && $_POST['submit']=="submit") {
    $link = new mysqli("localhost", "root", "", "rezoom");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
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
    }
    else {
        //login failed
    }

    mysqli_close($link);
}
?>

<html>
<body>
    <form action="#" method="post">
        <label for="username">Username</label><input type="text" value="" name="username" id="username">
        <label for="password">Password</label><input type="text" value="" name="password" id="password">
        <button name="submit" value="submit">Submit</button>
    </form>
</body>
</html>