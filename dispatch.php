
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch Php</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <style>
        .w80 {
            width: 80%;
        }
        .mt20 {
            margin-top: 20px;
        }
        .ml10 {
            margin-left: 10px;
        }
        .flex-child {
            flex: 1;
        }
        .flex-child:first-child {
             margin-left: 20px;
            }
        /* input.dispatchCss {
            background-color: gray;
            width: 120px;
            margin-left: 300px;
        } */
        input.dispatchCss:hover {
            width: 140px;
        }
       /*  body {
            padding-left: 10px
        } */
    </style>
</head>
<body>
    <?php require 'var.php'; ?>
    <script>
        let div = document.querySelector('div');
        if(div !== null || div !== undefined) div.parentNode.removeChild(div);
        
    </script>

<div class="container w80">
        <?php require 'nav.php' ?>
        <div style="background-color: beige">
            <section class="mt20">
                <form action="dispatch.php" method="post">
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <p class="col-sm-4 col-form-label ml10">Initial value</p>
                        <p class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">Your input</p>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="callerName" class="col-sm-4 col-form-label ml10">Caller's Name</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php
                            //$someValue = $_SESSION["vars"];
                            $finalValue = end($_SESSION["callerName"]);
                            if($finalValue == "{callerName}") {
                                array_pop($_SESSION["callerName"]);
                                $finalValue = end($_SESSION["callerName"]);
                            };
                            echo $finalValue;
                            echo "<input type='hidden' name='callerName' id='callerName' value='{callerName}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="contactNo" class="col-sm-4 col-form-label ml10">Contact Number</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php
                            $finalValue = end($_SESSION["contactNo"]);
                            if($finalValue == "{contactNo}") {
                                array_pop($_SESSION["contactNo"]);
                                $finalValue = end($_SESSION["contactNo"]);
                            };
                            echo $finalValue;
                            echo "<input type='hidden' name='contactNo' id='contactNo' value='{contactNo}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="locationOfIncident" class="col-sm-4 col-form-label ml10">Location of Incident</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php
                            $finalValue = end($_SESSION["locationOfIncident"]);
                            if($finalValue == "{locationOfIncident}") {
                                array_pop($_SESSION["locationOfIncident"]);
                                $finalValue = end($_SESSION["locationOfIncident"]);
                            };
                            echo $finalValue;
                            echo "<input type='hidden' name='locationOfIncident' id='locationOfIncident' value='{locationOfIncident}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="typeOfIncident" class="col-sm-4 col-form-label ml10">Type of incident</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php
                            $finalValue = end($_SESSION["typeOfIncident"]);
                            if($finalValue == "{typeOfIncident}") {
                                array_pop($_SESSION["typeOfIncident"]);
                                $finalValue = end($_SESSION["typeOfIncident"]);
                            };
                            $incidentTypes = ["010"=>"Fire", "020"=>"Riot", "030"=>"Burglary", "040"=>"Domestic Violence", "050"=>"Fallen Tree", "060"=>"Traffic Accident", "070"=>"Loan Shark", "1"=>"Pending", "2"=>"Dispatched", "3"=>"Completed", "999"=>"Others"];
                            foreach ($incidentTypes as $incidentId => $incidentChosen) {
                                if($finalValue == $incidentId) {
                                    echo $incidentChosen;
                                }
                            }
                            echo "<input type='hidden' name='typeOfIncident' id='typeOfIncident' value='{typeOfIncident}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="descriptionOfIncident" class="col-sm-4 col-form-label ml10">Description of Incident</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                        <?php
                            $finalValue = end($_SESSION["descriptionOfIncident"]);
                            if($finalValue == "{descriptionOfIncident}") {
                                array_pop($_SESSION["descriptionOfIncident"]);
                                $finalValue = end($_SESSION["descriptionOfIncident"]);
                            };
                            echo $finalValue;
                            echo "<input type='hidden' name='descriptionOfIncident' id='descriptionOfIncident' value='{descriptionOfIncident}'>";
                            ?>
                        </div>
                    </div>
                <div class="form-group row ml10" style="display: flex; width: 50%;">
                        <p class="col-sm-4 col-form-label ml10">Choose Patrol Car(s)</p>
                        <p class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                        <table style="display: flex; justify-content: center;">
                            <th style="padding: 0em 1.3em; margin-left: .5em;">Car's Number</th>
                            <th style="padding: 0em 1.3em; margin-left: .5em;">Car's Status</th>
                            <th style="padding: 0em 1.3em; margin-left: .5em;"></th>
                            <?php require_once 'db.php';
                            $cars = [];

                            while($row = $patrolExport->fetch_assoc()) {
                                $pcID = $row['patrolcar_id'];
                                $pcSID = $row['patrolcar_status_id'];
                                $statuses = ["Dispatched", "Patrol", "Free", "Arrived"];
                                switch ($pcSID) {
                                    case 1:
                                        $status = $statuses[0];
                                        array_push($cars, ["id" => $pcID, "status" => $status]);
                                        //echo "<script>console.log(`{$status}`);</script>";
                                        break;
                                    case 2:
                                        $status = $statuses[1];
                                        array_push($cars, ["id" => $pcID, "status" => $status]);
                                        //echo "<script>console.log(`{$status}`);</script>";
                                        break;
                                    case 3:
                                        $status = $statuses[2];
                                        array_push($cars, ["id" => $pcID, "status" => $status]);
                                        //echo "<script>console.log(`{$status}`);</script>";
                                        break;
                                    case 4:
                                        $status = $statuses[3];
                                        array_push($cars, ["id" => $pcID, "status" => $status]);
                                        //echo "<script>console.log(`{$status}`);</script>";
                                        break;
                                    default:
                                        echo "<script>console.log(`" . json_encode($pcSID) . "`);</script>";
                                        break;
                                    }
                            }
                            $amtOfCars = [];
                            while($row = $patrolAmtExport->fetch_assoc()) {
                                $amt = $row['patrolcar_id'];
                                array_push($amtOfCars, [$amt]);
                            }
                            
                            for($counter = 0; $counter<count($amtOfCars);$counter++) {
                                /* echo '<tr>';
                                echo "<td style='padding: 0em 1.3em; margin-left: .5em;'>{$cars[$counter]['id']}</td>";
                                echo "<td style='padding: 0em 1.3em; margin-left: .5em;'>{$cars[$counter]['status']}</td>";
                                echo '<td>';
                                echo "<input type='checkbox' name='chooseCar' value='{$cars[$counter]['id']}'>";
                                echo '</td>';
                                echo '</tr>'; */
                                if(isset($cars[$counter]) && $counter !== count($amtOfCars)) {
                                    echo "<script>console.log(`" . json_encode($cars[$counter]["id"]) . "`);</script>";
                                    echo "<script>console.log(`" . json_encode($cars[$counter]["status"]) . "`);</script>";
                                    echo '<tr>';
                                    echo "<td style='padding: 0em 1.3em; margin-left: .5em;'>{$cars[$counter]['id']}</td>";
                                    echo "<td style='padding: 0em 1.3em; margin-left: .5em;'>{$cars[$counter]['status']}</td>";
                                    echo '<td>';
                                    if($cars[$counter]["status"] == "Free") {
                                        echo "<input type='checkbox' name='chooseCar[]' value='{$cars[$counter]['id']}'>";
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            };
                            ?>
                        </table>
                        <input type="submit" name="dispatchButton" class="dispatchCss" value="Dispatch">
                    </div>
                </form>
            </section>
        </div>
    </div>
<?php

if(!isset($_POST["dispatchButton"]) && !isset($_POST["processButton"])) {
    header("Location: logcall.php?message=error");
    //echo "<script>console.log(`hi`);</script>";
    //exit();
}

if(isset($_POST["dispatchButton"])) {
    $insertTest = false;
    $dispatched = $_POST["chooseCar"];
    $amtOfDispatched = count($dispatched);
    //echo "<script>console.log(`{$amtOfDispatched}`);</script>";
    $incidentStatusId = 0;
    switch ($incidentStatusId) {
        case ($amtOfDispatched > 0):
            $incidentStatusId = 2;
            break;
        default:
            $incidentStatusId = 1;
            break;
    }

    $constant = 'constant';
    //#somethign = $constant('callerName');
/*     $val1 = callerName;
    echo $val1;
    $val2 = contactNo;
    $val3 = locationOfIncident;
    $val4 = typeOfIncident;
    $val5 = descriptionOfIncident; */
    $val1 = end($_SESSION["callerName"]);
    $val2 = end($_SESSION["contactNo"]);
    $val3 = end($_SESSION["locationOfIncident"]);
    $val4 = end($_SESSION["typeOfIncident"]);
    $val5 = end($_SESSION["descriptionOfIncident"]);
    $dataUpdating = "INSERT into incident (caller_name, phone_number, incident_type_id, incident_location, incident_desc, incident_status_id) values (
        '$val1, $val2, $val3, $val4, $val5, $incidentStatusId'
    )";
    $insertTest = $conn -> query($dataUpdating);
    $error = $conn -> error;
    //check if upload was successful
    $errorMsg1 = "Error at {$dataUpdating} ?";
    $errorMsg2 = "Error at {$error} ?";
    $testTemplate = "<script>console.log(`hi`);</script>";
    echo ($insertTest) ? $incidentId = mysqli_insert_id($conn) + $testTemplate : $errorMsg1 + '<br>' + $errorMsg2;
    
    $updateTest = false;
    $dispatchTest = false;

    for ($i=0; $i < $amtOfDispatched; $i++) { 
        $carIDArr = $dispatched[i];
        $setStatus = "UPDATE patrolcar SET patrolcar_status_id='1' WHERE patrolcar_id={$carIDArr}";
            $error2 = $conn -> error;
            $updateTest = $conn -> query($dataUpdating);
            $errorMsg3 = "Error at {$setStatus} ?"; 
            $errorMsg4 = "Error at {$error2} ?";
        echo ($updateTest) ? $dispatchUpdate = "INSERT into dispatch (incident_id, patrolcar_id, time_dispatched) values ($incidentId, $carIDArr, now())" : $errorMsg3 + $errorMsg4;


    }
    $updateTest = 
    $carIDStr = implode(", ", $dispatched); 
    if($insertTest === false) {
        echo "<script>alert(`Patrol Car {$carIDStr} has been dispatched!`); window.location.href = 'logcall.php'</script>";
    }
}
?>
</body>
</html>