<?php
include "SQL_query.php";
$SQLquery = new SQL_query();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$bongID = test_input($_POST["bongID"]);
$time = test_input($_POST["time"]);

$SQLquery -> newBeer($time, $bongID);
}


function test_input($data)
{
//https://www.w3schools.com/php/php_form_validation.asp
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}