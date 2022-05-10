<!doctype html>
<html lang="en">
<head>
    <!-- Most of these code are custom coded by me, a few from w3schools/stackoverflow :D!   -->
    <meta charset="UTF-8">
    <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Log Call</title>
    <style>
        .w80 {
            width: 80%;
        }
        .mt20 {
            margin-top: 20px;
        }
        .pdng20 {
            padding-top: 20px;
        }
        .tac {
            text-align: center;
        }
        .custom-select {
            position: relative;
        }
        .custom-select select{
            display: none;
        }
        .select-selected {
            background-color: black;
            width: 101%;
        }
        .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
        }
        .select-selected.select-arrow-active:after {
          border-color: transparent transparent #fff transparent;
          top: 7px;
        }
        .select-items div,.select-selected {
          color: white;
          padding: 8px 16px;
          border: 1px solid transparent;
          border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
          cursor: pointer;
        }
        .select-items {
            position: absolute;
            background-color: #333;
            width: 80%;
            max-height: 300px;
            overflow-x: hidden;
            overflow-y: scroll;
            top: 100%;
            /* Fits my screen size not responsive web design (yet?) */
            left: 1.4%;
            right: 0;
            z-index: 2; /* Most scenarios I use z-index 1 for position fixed items so z-index 2 will make it above most */
        }
        .select-hide {
          display: none;
        }
        .select-items div:hover, .same-as-selected {
          background-color: rgba(205, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container w80">
        <?php require_once 'nav.php' ?>
        <section class="mt20">
            <form action="dispatch.php" method="post" id="event" name="event">
                <div class="form-group row">
                    <label for="callerName" class="col-sm-4 col-form-label">Caller's Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="callerName" name="callerName" required>
                    </div>
                </div>
                <div class="form-group row pdng20">
                    <label for="contactNo" class="col-sm-4 col-form-label">Contact Number (Required)</label>
                    <div class="col-sm-8">
                        <input type="text" id="contactNo" name="contactNo" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row pdng20">
                    <label for="locationofIncident" class="col-sm-4 col-form-label">Location of Incident (Required)</label>
                    <div class="col-sm-8">
                        <input type="text" id="locationofIncident" name="locationofIncident" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row pdng20">
                    <label for="typeofIncident" class="col-sm-4 col-form-label">Type of Incident (Required)</label>
                    <div class="col-sm-8 custom-select" style="min-width: 200px; width: 877px;">
                        <select name="typeofIncident" id="typeofIncident" class="form-control">
                            <option value="" disabled>Select</option>
                            <?php require 'db.php';
                            while($row = $result->fetch_assoc()) {
                                echo "<option value={$row["incident_type_id"]}>{$row["incident_type_desc"]}</option><br>"; 
                            };
                            $conn->close();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row pdng20">
                    <label for="descriptionofIncident" class="col-sm-4 col-form-label">Description of Incident (Required)</label>
                    <div class="col-sm-8">
                        <textarea name="descriptionofIncident" id="descriptionofIncident" rows="5" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group row pdng20">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8 tac">
                        <input type="submit" id="btnProcessCall" value="Process Call" class="btn btn-primary">
                        <input type="reset" name="btnReset" value="Reset" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </section>
        <footer class="page-footer font-small blue pt-4 footer-copyright text-center py-3">&copy; 2021 Copyright</footer>
    </div>
    <script src="js/jquery-3.5.0.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript"></script>
    <script src="js/buttonValidation.js" type="text/javascript"></script>
    <script src="js/dropdown.js" type="text/javascript"></script>
</body>
</html>