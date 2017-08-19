<?php

$con=mysqli_connect("uoclbspdbinstance.c5cec24wzera.us-east-1.rds.amazonaws.com","uocroot","uocrootpass","uoclbsp_db");

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo 'hari';
?>