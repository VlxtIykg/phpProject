<!-- <?php 
require 'update.php';
require 'db.php';
$car_ID = $_POST['patrolCarId'];
$_SESSION["choosePatrolStatus"][] = $_POST["choosePatrolStatus"];
$updatedStatus = end($_SESSION["choosePatrolStatus"]);
if(isset($updatedStatus)) {
    echo "<script>console.log(`$updatedStatus`);</script>";
    switch ($updatedStatus) {
        case 'free':
            $updateStatusFree = "UPDATE patrolcar SET patrolcar_status_id='3' WHERE patrolcar_id='{$car_ID}'";
            $statusFree = $conn -> query($updateStatusFree);
            break;
        case 'arrived':
            $updateStatusArrived = "UPDATE patrolcar SET patrolcar_status_id='4' WHERE patrolcar_id='{$car_ID}'";
            $statusArrived = $conn -> query($updateStatusArrived);
            break;
        case 'patrol':
            $updateStatusPatrol = "UPDATE patrolcar SET patrolcar_status_id='2' WHERE patrolcar_id='{$car_ID}'";
            $statusPatrol = $conn -> query($updateStatusPatrol);
            break;
        default:
            $updateStatusFree = "UPDATE patrolcar SET patrolcar_status_id='3' WHERE patrolcar_id='{$car_ID}'";
            $statusFree = $conn -> query($updateStatusFree);
            break;
    }    
}
?> -->