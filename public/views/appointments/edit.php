<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 15-10-2015
 * Time: 22:29
 */

$sql = "SELECT * FROM tbl_apoinments WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$customer = $q->fetch(PDO::FETCH_OBJ);

$allowed = [1,2];

if (! in_array($_SESSION['id'], $allowed) ){

    $messageBag->add('a', 'Not allowed to edit a appointment');
    header('location: ' . HTTP_PATH . '/public/views/appointments/overview.php');

}

?>


<div class="container">
    <header>
        <div class="header-welcome">
            <img src="../../img/banner.jpg" alt="banner">
        </div>
    </header>
    <?php require_once __DIR__ . '/../../aside.php'; ?>
    <main>
        <h2>Edit customer</h2>
        <form class="col-md-6 col-md-push-3" action="<?= HTTP_PATH . '/app/controllers/customerController.php'?>" method="post">


            <input type="hidden" name="type" value="editCustomer">
            <input type="hidden" name="id" value="<?= $customer->id ?>">

            <div class="form-group">
                <label for="companyName">Appointment date: </label>
                <input class="form-control" name="appointmentDate" type="datetime-local" value="<?= $customer->appointmentDate ?>">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" value="<?= $customer->description?>" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>


            <input type="submit" value="editAppointment">

        </form>
    </main>
</div>


