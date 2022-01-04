<?php

    $host = "ec2-54-174-43-13.compute-1.amazonaws.com";
    $port = "5432";
    $dbname = "d9qrmuma2f3q4c"; 
    $user = "ryjfyfbkiezlnl";
    $pass = "42fcaff96c64f418325b75658f23c74d3fbc39c0c85e87d7ef79af2fbdbc3bf1";

    $conn = pg_connect("host=" . $host . " port=". $port ." dbname=". $dbname ." user=". $user ." password=". $pass );
?>