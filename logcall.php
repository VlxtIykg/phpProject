<!doctype html>
<html lang="en">
    <head>
    <!-- Most of these code are custom coded by me, a few from w3schools/stackoverflow :D!   -->
    <meta charset="UTF-8">
    <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Log Call</title>
    <style>

        .mt20 {
            margin-top: 20px;
        }
        .pdng20 {
            padding-top: 20px;
        }
        .tac {
            text-align: center;
        }
        <?php include './css/selectBar.css' ?>
        /* Due to hierachy css theory they will inherit the most recent css styling making note.css styles be applied over table */
        <?php include './css/note.css' ?>
    </style>
</head>
<body>
    <div class="container w80">
        <?php require_once 'nav.php' ?>
        <div class="note">
            <table>
                <div class="thBote" style="position: relativel display: flex;">
                    <th>Note</th>
                </div>
            </table>
            <!-- Originally wanted a table, with divs, didn't seem that effective -->
                <div style="border-top: solid 1px #e5e5e6;" class="noteLayout">
                  <p style="color: #8a0f0c; font-weight: bold;">Input Field</p>
                  <p style="color: #8a0f0c; font-weight: bold;">Input Name/ID</p>
                  <p style="color: #8a0f0c; font-weight: bold;">Validation need to be done</p>
                </div>
                <div style="" class="noteLayout hoverDiv">
                  <p>Caller's Name</p>
                  <p>callerName</p>
                  <ul>
                      <li class="noteList">Not a required field</li>
                      <li class="noteList">Only alphabets are allowed</li>
                      <li class="noteList">Spacing lower, and upper case accepted</li>
                  </ul>
                </div>
                <div style="" class="noteLayout hoverDiv">
                  <p>Contact number</p>
                  <p>contactNo</p>
                  <ul>
                      <li class="noteList">Required field. Cannot be left empty</li>
                      <li class="noteList">Only 8 digits allowed</li>
                      <li class="noteList">Cannot be nan, no alphabets, no symbols</li>
                  </ul>
                </div>
                <div style="" class="noteLayout hoverDiv">
                  <p>Location of Incident</p>
                  <p>locationofIncident</p>
                  <ul>
                      <li class="noteList">Reqiured field. Cannot be left empty</li>
                  </ul>
                </div>
                <div style="" class="noteLayout hoverDiv">
                  <p>Type of Incident</p>
                  <p>typeofincident</p>
                  <ul>
                      <li class="noteList">Reqiured field.</li>
                      <li class="noteList">A selection must be amde</li>
                  </ul>
                </div>
                <div style="" class="noteLayout hoverDiv">
                  <p>Description of Incident</p>
                  <p>descriptionofIncident</p>
                  <ul>
                      <li class="noteList">Required field. Cannot be left empty</li>
                  </ul>
                </div>
        </div>
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