<?
if($_GET['submit']=="submit")
    $link = new mysqli("127.0.0.1", "my_user", "my_password", "my_db");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

    $query = "SELECT COUNT(*) FROM tblUsers WHERE username='".$_GET['username']."'";
    $result = $link->query($query);

    if($result->num_rows==1) {
        //user already exists
    }
    else { 
        $query = "INSERT INTO tblUsers (username,password) VALUES (".$_GET['username'].",".$_GET['password'].");";
        $result = $link->query($query);
    }

    mysqli_close($link);
}
?>

<html>
<body>
    <form action="#" method="get">
        <input type="text" value="" name="username" id="username">
        <input type="text" value="" name="password" id="password">
        <button name="submit" value="submit">Submit</button>
    </form>
</body>
</html>