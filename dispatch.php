<?php
include 'logcall.php';
define('callerName', '$_POST[\'callerName\']');
define('contactNo', '$_POST[\'contactNo\']');
define('locationOfIncident', '$_POST[\'locationOfIncident\']');
define('typeOfIncident', '$_POST[\'typeOfIncident\']');
define('descriptionOfIncident', '$_POST[\'descriptionOfIncident\']');

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
    </style>
</head>
<body>
    <div class="container w80">
        <?php require_once 'nav.php' ?>

        <section class="mt20">
            <form action="dispath.php" method="post">
                <div class="form-group row">
                    <label for="callerName" class="col-sm-4 col-form-label">Caller's Name</label>
                    <div class="col-sm-8">
                        <?php echo constant('callerName') ?>
                        <?php
                        echo "<input type='hidden' name='callerName' id='callerName' value='{constant('callerName')}'>"
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label"></label>
                
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label"></label>
                
                </div>
            </form>
        </section>
    </div>
</body>
</html>