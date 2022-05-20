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
    </style>
</head>
<body>
    <div class="container w80">
        <?php require 'nav.php' ?>

        <section>
            <form action="update.php" method="post">
                <div class="form-group row">
                    <label for="patrolCarId" class="col-sm-4 col-form-label">
                        <p>Enter Patrol Car's ID <br> E.g.<sub title="QX1111A" style="pointer: cursor;">QX1111A</sub></p>
                    </label>
                </div>
            </form>
        </section>
    </div>
</body>
</html>