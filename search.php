<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patrol Car</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"></link>
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
        .updateButton {
            /* margin-left: 5em */
            margin: 0em 1em;
        }
        .flexBox {
            display: flex;
            justify-content: space-around;
            padding: 0em 5em;
        }
        .patrolCar {
            padding: 0em .5em;
            width: 120px;
            /* left: 10%; */
        }
        .inputPatrol {
            width: 80%;
            margin-left: 10%;
        }
    </style>
</head>
<body>
    <div class="container w80">
        <?php require 'nav.php' ?>

        <section>
            <form action="update.php" method="post">
                <div class="flexBox">
                    <label for="patrolCarId" class="patrolCar">
                        <p>Enter Patrol Car's ID <sup title="QX1111A" style="pointer: cursor;">E.g.</sup></p>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="inputPatrol" name="patrolCarId" id="patrolCarId">
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" class="updateButton" name="search" id="search">
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>