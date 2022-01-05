<?php

    $host = "ec2-34-226-179-89.compute-1.amazonaws.com";
    $port = "5432";
    $dbname = "dbtgo3jpgfmr95"; 
    $user = "yxqknkvbexgqdr";
    $pass = "d4026c6586de57df4b661c696c734175dff26f80cb245f381bbbd735382bed2a";

    $conn = pg_connect("host=" . $host . " port=". $port ." dbname=". $dbname ." user=". $user ." password=". $pass );
?>