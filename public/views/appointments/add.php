<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: Maarten
 * Date: 23-10-2015
 * Time: 9:39
 */

$sql = "SELECT * FROM tbl_customers WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$customer = $q->fetch(PDO::FETCH_OBJ);
var_dump($customer);
?>

<form class="col-md-4 col-md-push-4" action="../../../app/controllers/customerController.php" method="POST">
    <input type="hidden" name="id" value="<?= $customer['id']; ?>">
    <h1>Add Appointment</h1>

    <input type="hidden" name="type" value="addAppointment">

    <div class="form-group">
        <label for="">ID:</label>
        <input type="text" name="customerID" value="<?=$customer['id']; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Appointment Date:</label>
        <input type="datetime-local" name="appointmentDate" value="appointmentDate" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <input type="submit" value="Add appointment" class="btn btn-primary"/>

</form>



<?php require_once __DIR__ . '/../../footer.php'; ?>
