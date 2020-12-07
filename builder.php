<?php
    session_start();

    if(!isset($_SESSION['id'])) {
        header('Location: /rezoom/login.php');
    }

    $link = new mysqli("localhost", "root", "", "rezoom");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    if(isset($_POST['submit']) && $_POST['submit']=="submit") {
        echo "adding a new kv pair";
        $insertionQuery = "INSERT INTO tblData (userID,infoType,infoValue,lang)
            VALUES ('".$_SESSION['id']."','".$_POST['key']."','".$_POST['value']."','".$_POST['lang']."')";
        var_dump($insertionQuery);
        $insertionResult = $link->query($insertionQuery);
    }

    $selectionQuery = "SELECT * FROM tbldata WHERE userID=".$_SESSION['id'];
    $selectionResult = $link->query($selectionQuery);

    mysqli_close($link);
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
        <table>
            <tr><th>Type</th><th>Value</th><th>Lang</th></tr>
            <?php
                while ($row = $selectionResult->fetch_assoc()) {
                    echo "<tr><td>".$row["infoType"]."</td><td>".$row["infoValue"]."</td><td>".$row["lang"]."</td></tr>";
                }
            ?>
            <tr>
                <td>
                    <select name="key">
                        <option value="name">Name</option>
                        <option value="phone">Phone</option>
                        <option value="email">Email</option>
                        <option value="address">Address</option>
                        <option value="job">Job</option>
                        <option value="education">Education</option>
                        <option value="certification">Certification</option>
                    </select>
                
                </td>
                <td><textarea name="value"></textarea></td>
                <td><input type="text" name="lang"></td>
            </tr>
        </table>
        <button name="submit" value="submit">Submit</button>
    </form>
</body>
</html>