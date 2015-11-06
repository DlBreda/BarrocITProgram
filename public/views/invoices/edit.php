<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:53
 */


$sql = "SELECT * FROM tbl_invoices WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$customer = $q->fetch(PDO::FETCH_OBJ);

$allowed = [1,2];

if (! in_array($_SESSION['id'], $allowed) ){

    $messageBag->add('a', 'Not allowed to edit a customer');
    header('location: ' . HTTP_PATH . '/public/views/customers/overview.php');

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
        <h2>Edit invoice</h2>
        <form class="col-md-6 col-md-push-3" action="<?= HTTP_PATH . '/app/controllers/customerController.php'?>" method="post">


            <input type="hidden" name="type" value="editCustomer">
            <input type="hidden" name="id" value="<?= $customer->id ?>">
            <div class="form-group">
                <label for="companyName">Description: </label>
                <input class="form-control" name="description" type="text" value="<?= $customer->companyName ?>">
            </div>

            <div class="form-group">
                <label for="creditWorthy">Paid: </label>
                </br>
                <input type="radio" name="paid" value="<?= $customer->creditWorthy == 1; ?>" class="" /> <p style="float: left; margin-right: 10px; margin-bottom: 0px;">Yes</p>
                </br>
                <input type="radio" name="paid" value="<?= $customer->creditWorthy == 0; ?>" class=""/> <p style="float: left; margin-right: 16px;">No</p>
            </div>
            <div class="form-group">
                <label for="creditWorthy">Send: </label>
                </br>
                <input type="radio" name="send" value="<?= $customer->creditWorthy == 1; ?>" class="" /> <p style="float: left; margin-right: 10px; margin-bottom: 0px;">Yes</p>
                </br>
                <input type="radio" name="send" value="<?= $customer->creditWorthy == 0; ?>" class=""/> <p style="float: left; margin-right: 16px;">No</p>
            </div>

            <input type="submit" value="Edit invoice" clas="btn btn-primary">

        </form>
    </main>
</div>


