<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:13
 */

$sql = "SELECT * FROM tbl_customers WHERE id = :id";
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
        <h2>Edit customer</h2>
        <form class="col-md-6 col-md-push-3" action="<?= HTTP_PATH . '/app/controllers/customerController.php'?>" method="post">


            <input type="hidden" name="type" value="editCustomer">
            <input type="hidden" name="id" value="<?= $customer->id ?>">
                <div class="form-group">
                    <label for="companyName">Company name: </label>
                    <input class="form-control" name="companyName" type="text" value="<?= $customer->companyName ?>">
                </div>

                <div class="form-group">
                    <label for="creditWorthy">Credit worthy: </label>
                    </br>
                    <input type="radio" name="creditWorthy" value="<?= $customer->creditWorthy == 1; ?>" class="" /> <p style="float: left; margin-right: 10px; margin-bottom: 0px;">Yes</p>
                    </br>
                    <input type="radio" name="creditWorthy" value="<?= $customer->creditWorthy == 0; ?>" class=""/> <p style="float: left; margin-right: 16px;">No</p>
                </div>
                <div class="form-group">
                    <label for="bankAccountNumber">Bank account number: </label>
                    <input class="form-control" name="bankAccountNumber" type="text" value="<?= $customer->bankAccountNumber ?>">
                </div>

            <input type="submit" value="Edit">

        </form>
    </main>
</div>


