<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "voice";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
