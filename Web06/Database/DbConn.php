<?php

$server = 'uoclbspdbinstance.c5cec24wzera.us-east-1.rds.amazonaws.com:3306';
$username = 'uocroot';
$password = 'uocrootpass';
$db = 'uoclbsp_db';

$con = mysqli_connect($server, $username, $password, $db);
if(!$con){
    die("Connection Not Established".mysqli_connect_error());
}

?>


