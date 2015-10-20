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

        </div>
    </header>
    <?php require_once __DIR__ . '/../../aside.php'; ?>
    <main>
        <h2>Edit customer</h2>
        <form class="col-md-6 col-md-push-3" action="" method="post">


            <input type="hidden" name="type" value="edit">
                <div class="form-group">
                    <label for="companyName">Company name: </label>
                    <input class="form-control" type="text" value="<?= $customer->companyName ?>">
                </div>
                <div class="form-group">
                    <label for="adress">Adress: </label>
                    <input class="form-control" type="text" value="<?= $customer->adress ?>">
                </div>
                <div class="form-group">
                    <label for="postalZip">Postal zipcode: </label>
                    <input class="form-control" type="text" value="<?= $customer->postalZip ?>">
                </div>
                <div class="form-group">
                    <label for="adress2">Adress 2: </label>
                    <input class="form-control" type="text" value="<?= $customer->adress2 ?>">
                </div>
                <div class="form-group">
                    <label for="postalZip2">Postal zipcode 2: </label>
                    <input class="form-control" type="text" value="<?= $customer->postalZip2 ?>">
                </div>
                <div class="form-group">
                    <label for="contactPerson">Contact person: </label>
                    <input class="form-control" type="text" value="<?= $customer->contactPerson ?>"
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone number: </label>
                    <input class="form-control" type="text" value="<?= $customer->phoneNumber ?>">
                </div>
                <div class="form-group">
                    <label for="faxNumber">Fax number: </label>
                    <input class="form-control" type="text" value="<?= $customer->faxNumber ?>"
                </div>
                <div class="form-group">
                    <label for="emailAdress">Email adress: </label>
                    <input class="form-control" type="text" value="<?= $customer->emailAdress ?>"
                </div>

            <button>Edit</button>

        </form>
    </main>
</div>


