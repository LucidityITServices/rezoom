<?php
    if(!isset($_GET['uID'])) {
        print "Unspecified user ID.";
        die();
    }

    if(!isset($_GET['lang'])) {
        $lang = "en";
        die();
    }

    if(!isset($_GET['tID'])) {
        print "No resume template selected.";
        die();
    }

    $c = curl_init("localhost/rezoom/viewer.php");

    curl_setopt($c,CURLOPT_HEADER,true);

    curl_exec($c);
    curl_close($c);
