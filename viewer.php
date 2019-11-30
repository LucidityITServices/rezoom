<?php
    //TODO: check that user is logged in
    session_start();
    $_SESSION['username'] = "zzxjoanw";
    $_SESSION['id'] = 1;
    $lang = $_GET['lang'];

    $link = new mysqli("localhost", "root", "", "rezoom");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    //TODO: dry this out. use a cached query and run subqueries on that? or combine them into one query and loop through the
    //results, pulling out only relevant rows?
    $nameQuery = "SELECT infoValue
                  FROM tbldata
                  WHERE userID=".$_SESSION['id']." AND infoType='name' AND lang='".$_GET['lang']."'";
    $nameResult = $link->query($nameQuery);

    $emailQuery = "SELECT infoValue FROM tblData
                   WHERE userID=".$_SESSION['id']." AND infoType='email' AND lang='".$_GET['lang']."'";
    $emailResult = $link->query($emailQuery);

    $phoneQuery = "SELECT infoValue FROM tblData
                   WHERE userID=".$_SESSION['id']." AND infoType='phone' AND lang='".$_GET['lang']."'";
    $phoneResult = $link->query($phoneQuery);

    $addressQuery = "SELECT infoValue FROM tblData
                     WHERE userID=".$_SESSION['id']." AND infoType='address' AND lang='".$_GET['lang']."'";
    $addressResult = $link->query($addressQuery);

    $educationQuery = "SELECT infoValue FROM tblData
                       WHERE userID=".$_SESSION['id']." AND infoType='education' AND lang='".$_GET['lang']."'";
    $educationResult = $link->query($educationQuery);

    $jobsQuery = "SELECT infoValue FROM tblData
                  WHERE userID=".$_SESSION['id']." AND infoType='job' AND lang='".$_GET['lang']."'";
    $jobsResult = $link->query($jobsQuery);

    $certificationsQuery = "SELECT infoValue FROM tblData
                            WHERE userID=".$_SESSION['id']." AND infoType='certification' AND lang='".$_GET['lang']."'";
    $certificationsResult = $link->query($certificationsQuery);

    mysqli_close($link);
?>

<html>
<head>
    <link rel="stylesheet" href="templates/<?php echo $_GET['css'] ?>.css">
</head>
<body>
    <div id="header">
        <h1>Personal Info</h1>
        <?php
            while ($row = $nameResult->fetch_assoc()) {
                echo "<div class='name'>".$row["infoValue"]."</div>";
            }

            while ($row = $emailResult->fetch_assoc()) {
                echo "<div class='email'>".$row["infoValue"]."</div>";
            }

            while ($row = $phoneResult->fetch_assoc()) {
                echo "<div class='phone'>".$row["infoValue"]."</div>";
            }

            while ($row = $addressResult->fetch_assoc()) {
                echo "<div class='address'>".$row["infoValue"]."</div>";
            }
        ?>
    </div>
    <div id="education">
        <h1>Education</h1>
        <?php
            while ($row = $educationResult->fetch_assoc()) {
                echo "<div class='education'>".$row["infoValue"]."</div>";
            }
        ?>
    </div>

    <div id="jobs">
        <h1>Jobs</h1>
        <?php
            while ($row = $jobsResult->fetch_assoc()) {
                echo "<div class='jobs'>".$row["infoValue"]."</div>";
            }
        ?>
    </div>

    <div id="certifications">
        <h1>Certifications</h1>
        <?php
            while ($row = $certificationsResult->fetch_assoc()) {
                echo "<div class='certification'>".$row["infoValue"]."</div>";
            }
        ?>
    </div>
</body>
</html>