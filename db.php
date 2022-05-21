<?php
define('DB USER', "root");
define('DB PASSWORD', "");
define('DB DATABASE', "pessdb");
define('DB SERVER', "localhost");

$conn = new mysqli(constant('DB SERVER'), constant('DB USER'), constant('DB PASSWORD'), constant('DB DATABASE'));
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT incident_type_desc, incident_type_id from incident_type";
$incident = $conn->query($sql);

$patrolDetails = "SELECT patrolcar_id, patrolcar_status_id from patrolcar";
$patrolExport = $conn->query($patrolDetails);

$patrolcarAmt = "SELECT patrolcar_id from patrolcar";
$patrolAmtExport = $conn->query($patrolDetails);