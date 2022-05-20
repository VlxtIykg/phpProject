<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update.php</title>
    <script async src="js/jquery-3.5.0.min.js" type="text/javascript"></script> <!-- To prevent bootstrap from loading before jquery -->
    <script defer src="js/bootstrap.js" type="text/javascript"></script>
    <script defer src="js/popper.min.js" type="text/javascript"></script>
    <script defer src="js/dropdown.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/selectBar.css" type="text/css">
</head>
<body>
<?php require 'nav.php';?>
    <p>Chosen car id</p>
<?php
require_once 'db.php';
$statuses = [];
$car = null;
$car2 = null;
if(isset($_POST['search'])) {
    
    echo '<script>console.log(`Hi search button was clicked!`)</script>';
    
    //check if assoc array has car we are looking for
    $car_ID = $_POST['patrolCarId'];
    function check($content) {
        $car_ID = $_POST['patrolCarId'];
        
        define('DB_USER', "root");
        define('DB_PASSWORD', "");
        define('DB_DATABASE', "pessdb");
        define('DB_SERVER', "localhost");
        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $getID = "SELECT * from patrolcar where patrolcar_id='{$car_ID}'";
        $carFound = $conn->query($getID);
        $row = $carFound->fetch_assoc();
        //echo $row[".'$car_ID'."];
        $getTotalCars = "SELECT patrolcar_id from patrolcar";
        $totalCars = $conn->query($getTotalCars);
        //$carsAvailable = $totalCars->fetch_assoc();
        $carsTotalArr = [];
        while($car = $totalCars -> fetch_assoc()) {
            echo "<script>console.log(`" . json_encode($car) . "`);</script>";
            $javascriptAcceptedArr = array_values($car);
            $javascriptAcceptedStr = implode("", $javascriptAcceptedArr);
            array_push($carsTotalArr, $javascriptAcceptedStr);
            echo "<script>console.log(`" . json_encode($javascriptAcceptedStr) . "`);</script>";
        }
        echo "<script>console.log(`" . json_encode($carsTotalArr) . "`);</script>";
        $carText = implode("<br>", $carsTotalArr);
        //echo $car_ID;
        //echo $javascriptAcceptedArr[1];
        return  $row['patrolcar_id'] ?? "<div id='panelOfUnavaialbleRecords'>Records</div> <script>const userConfirmation = confirm('Not an available id, would you like to proceed?'); if(userConfirmation) {const setUnavailableRecords = document.getElementById('panelOfUnavaialbleRecords'); setUnavailableRecords.innerHTML += '<br>You searched: {$car_ID}<p style=\'padding-left: 20px;\'>Valid record: false;</p><br><p>List of cars:</p>{$carText}';} else {window.location.href='search.php'; console.log('work?')}</script>'";
    }
        check($car_ID);
        $sql = "SELECT * FROM patrolcar WHERE patrolcar_id = '{$car_ID}'";
        $result = $conn -> query($sql);
        if($row = $result -> fetch_assoc()) {
            $id = $row['patrolcar_id'];
            $statusId = $row['patrolcar_status_id'];
            $car2 = ["id" => $id, "statusId" => $statusId];
        }

        $sql = "SELECT * FROM patrolcar_status";
        $result = $conn -> query($sql);
        while ($row = $result -> fetch_assoc()) {
            $id = $row['patrolcar_status_id'];
            $desc = $row['patrolcar_status_desc'];
            $status = ["id" => $id, "desc" => $desc];
            array_push($statuses, $status);
        };
    };
    if(isset($_POST['btnUpdate'])) {
        require_once 'db.php';
    $updateSuccess = false;

    define('DB_USER', "root");
    define('DB_PASSWORD', "");
    define('DB_DATABASE', "pessdb");
    define('DB_SERVER', "localhost");

    if($conn -> connect_error) {
        die ("Connection failed: {$conn -> connect_error}");
    }
    $newStatusId = $_POST['carStatus'];
    $carid = $_POST['patrolCarId'];

    $sql = "UPDATE patrolcar SET patrolcar_status_id = '{$newStatusId}' WHERE patrolcar_id ='{$carid}'";
    $updateSucess = $conn -> query($sql);
    if($updateSuccess !== true) {
        echo "Error: {$sql} <br> {$conn -> error}";
    }

    if($newStatusId == '4') {
        $sql = "UPDATE dispatch SET time_arrived = NOW() WHERE time_arrived is NULL AND patrolcar_id = {$car_ID}";
        $updateSuccess = $conn -> query($sql);
        if(!$updateSuccess) {
            echo "Error: {$sql} <br> {$conn -> error}";
        }
    }
    else if ($newStatusId == "3") {
        $sql = "SELECT incident_id from dispatch WHERE time_completed is NULL AND patrolcar_id = '{$carid}'";
        $result = $conn->query($sql);

        $incidentId = 0;
        if ($result -> num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $incidentId = $row['incident_id'];
            }
        }

        $sql = "UPDATE dispatch SET time_completed = NOW() WHERE time_completed is NULL AND patrolcar_id = '{$carid}'";
        $updateSuccess = $conn -> query($sql);
        if(!$updateSuccess) {
            echo "Error: {$sql} <br> {$conn -> error}";
        }

        $sql = "UPDATE incident SET incident_status_id = '3' WHERE incident_id = {$incidentId}";

        $updateSuccess = $conn -> query($sql);
        if($updateSuccess === false) {
            echo "Error: {$sql} <br> {$conn -> error}";
        }
    }
    if ($updateSuccess === TRUE) {
        //header("Location: search.php?message=success");
        echo '<script>alert("You have successfully changed the patrol car status!"); window.location.href="search.php"</script>';
    }
    }
    ?>
<section>
    <form action="update.php" method="POST">
        <?php
    if($car2 != null) {
        echo '<div class="form-group row">';
        echo '<label for="patrolCarId" class="col-sm-4 col-form-label">Car Number</label>';
        echo '<div class="col-sm-8"></div>';
        echo $car2['id'];
        echo "<input type='hidden' name='patrolCarId' id='patrolCarId' value='{$car2['id']}'>";
        echo '</div>';
        echo '</div>';
        echo '<div class="form-group row">';
        echo '<label for="carNo" class="col-sm-4 col-form-label">Patrol Car Status</label>';
        echo '<div class="col-sm-8">';
        echo '<select id="carStatus" class="form-control" name="carStatus">';
        $totalStatus = count($statuses);
        for ($i=0; $i<$totalStatus; $i++) {
            echo "<script>console.log(`" . json_encode($totalStatus) . "`);</script>";
            $status2 = $statuses[$i];
            $selected = "";
            if($status['id'] == $car['statusId']) {
                $selected = ' selected="selected"';
            }
            echo "<option value='{$status2['id']}' {$selected}>{$status2['desc']}</option>";
            $selected="";
        }
        echo '</select>';
        echo '</div>';
        echo '</div>';
        }
        else {
            echo '<div class="form-group row">';
            echo '<div class="col-sm-12">No records found.</div>';
            echo '</div>';
    }
        ?>
        <div class="form-group row">
            <div class="col-sm4"></div>
            <div class="col-sm-8"><input type="submit" class="btn btn-primary" name="btnUpdate" value="Update"></div>
        </div>
    </form>
</section>
<footer class="page-footer font-small blue pt-4 footer-copyright text-center py3">&copy; 2020 Copyright</footer>
</body>
</html>