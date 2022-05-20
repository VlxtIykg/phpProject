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
$status = [];
$car = null;

if(isset($_POST['search'])) {
    echo '<script>console.log(`Hi search button was clicked!`)</script>';
    
    //check if assoc array has car we are looking for
    $car_ID = $_POST['patrolCarId'];
    function check($content) {
        require 'db.php';
        $car_ID = $_POST['patrolCarId'];
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
        echo check($car_ID);
};

?>
<form action="update.php" method="post">
    <?php
    <div class="">
        <label for="choosePatrolStatus">
            Choose patrol status:
        </label>
        <div class="custom-select">
            <select name="choosePatrolStatus" id="choosePatrolStatus">
                <!-- No distpached option as they need to dispatch using dispatch.php -->
                <option value="" disabled>Select</option>
                <option value="free">Free</option>
                <option value="arrived">Arrived</option>
                <option value="patrol">Patrol</option>
            </select>
        </div>
        ?>
        <input type="submit" value="Update Car Status" style="margin: 3em;">
    </div>
</form>
</body>
</html>