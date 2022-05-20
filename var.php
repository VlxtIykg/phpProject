<?php
session_start();
require 'logcall.php';
$_SESSION["callerName"][] = $_POST["callerName"];
$_SESSION["contactNo"][] = $_POST["contactNo"];
$_SESSION["locationOfIncident"][] = $_POST["locationOfIncident"];
$_SESSION["typeOfIncident"][] = $_POST["typeOfIncident"];
$_SESSION["descriptionOfIncident"][] = $_POST["descriptionOfIncident"];
//unset($_SESSION["vars"]);
/* define('callerName', $_POST['callerName']);
define('contactNo', $_POST['contactNo']);
define('locationOfIncident', $_POST['locationOfIncident']);
define('typeOfIncident', $_POST['typeOfIncident']);
define('descriptionOfIncident', $_POST['descriptionOfIncident']); */
?>
