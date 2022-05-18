<?php
include 'logcall.php';
define('callerName', $_POST['callerName']);
define('contactNo', $_POST['contactNo']);
define('locationOfIncident', $_POST['locationOfIncident']);
define('typeOfIncident', $_POST['typeOfIncident']);
define('descriptionOfIncident', $_POST['descriptionOfIncident']);
?>


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
    </style>
</head>
<body>
    <script>
        let div = document.querySelector('div');
        if(div !== null || div !== undefined) div.parentNode.removeChild(div);
    </script>

<div class="container w80">
        <?php require 'nav.php' ?>

        <div style="background-color: beige">
            <section class="mt20">
                <form action="dispath.php" method="post">
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <p class="col-sm-4 col-form-label ml10">Initial value</p>
                        <p class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">Your input</p>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="callerName" class="col-sm-4 col-form-label ml10">Caller's Name</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php echo callerName;
                            echo "<input type='hidden' name='callerName' id='callerName' value='${callerName}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="contactNo" class="col-sm-4 col-form-label ml10">Contact Number</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php echo contactNo;
                            echo "<input type='hidden' name='contactNo' id='contactNo' value='${contactNo}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="locationOfIncident" class="col-sm-4 col-form-label ml10">Location of Incident</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php echo locationOfIncident;
                            echo "<input type='hidden' name='locationOfIncident' id='locationOfIncident' value='${locationOfIncident}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="typeOfIncident" class="col-sm-4 col-form-label ml10">Type of incident</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php
                            $incidentTypes = ["010"=>"Fire", "020"=>"Riot", "030"=>"Burglary", "040"=>"Domestic Violence", "050"=>"Fallen Tree", "060"=>"Traffic Accident", "070"=>"Loan Shark", "1"=>"Pending", "2"=>"Dispatched", "3"=>"Completed", "999"=>"Others"];
                            foreach ($incidentTypes as $incidentId => $incidentChosen) {
                                if(typeOfIncident == $incidentId) {
                                    echo $incidentChosen;
                                }
                            }
                            echo "<input type='hidden' name='callerName' id='callerName' value='${typeOfIncident}'>";
                            ?>
                        </div>
                    </div>
                    <div class="form-group row ml10" style="display: flex; width: 50%">
                        <label for="descriptionOfIncident" class="col-sm-4 col-form-label ml10">Description of Incident</label>
                        <!--Col sm 8 to position caller's name side by side with post req-->
                        <div class="col-sm-8" style="width: 50%; margin-top: .4rem; float: left;">
                            <?php echo descriptionOfIncident;
                            echo "<input type='hidden' name='callerName' id='callerName' value='${descriptionOfIncident}'>";
                            ?>
                        </div>
                    </div>
                </form>
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
                                $status = $row['patrolcar_status_desc'];
                                array_push($cars, ["id" => $pcID, "status" => $status]);
                            }
                            for($counter = 0; $counter<count($cars);$counter++) {
                                /* echo '<tr>';
                                echo "<td style='padding: 0em 1.3em; margin-left: .5em;'>{$cars[$counter]['id']}</td>";
                                echo "<td style='padding: 0em 1.3em; margin-left: .5em;'>{$cars[$counter]['status']}</td>";
                                echo '<td>';
                                echo "<input type='checkbox' name='chooseCar' value='{$cars[$counter]['id']}'>";
                                echo '</td>';
                                echo '</tr>'; */
                                echo $counter;
                            };
                            ?>
                        </table>
                        </p>
                </div>
            </section>
        </div>
    </div>

</body>
</html>