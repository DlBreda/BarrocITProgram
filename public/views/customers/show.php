<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:12
 */
if (! isset($_GET['id']) )
{
    $messageBag->add('a', 'Geen id gekozen om te tonen...');
    header('location: ' . HTTP_PATH . 'public/views/customers/overview.php');
}

$sql = "SELECT * FROM tbl_customers WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$customer = $q->fetch(PDO::FETCH_OBJ);


?>

<div class="container">
    <header>
        <div class="header-welcome">
            <img src="../../img/banner.jpg" alt="banner">
        </div>
    </header>
    <?php require_once __DIR__ . '/../../aside.php'; ?>
    <main>
        <h2><?= $customer->companyName  ?></h2>
        <h3><a href="../appointments/add.php"> Add appointment</a></h3>


        <ul class="customers-content">
            <li>Company name: <?= $customer->companyName ?></li>
            <li>ID: <?= $customer->id ?> </li>
            <li>Adress: <?= $customer->adress ?> </li>
            <li>Postal zipcode: <?= $customer->postalZip ?> </li>
            <li>Adress 2: <?= empty($customer->adress2) ? '<i> no adress </i>' : $customer->adress2 ?></li>
            <li>Postal zipcode 2: <?= empty ($customer->postalZip2) ? '<i> no postal zipcode </i>' : $customer->postalZip2 ?> </li>
            <li>Contact person: <?= $customer->contactPerson ?> </li>
            <li>Phone number: <?= $customer->phoneNumber ?> </li>
            <li>Fax number: <?= empty ($customer->faxNumber) ? '<i> no fax number </i>' : $customer->faxNumber  ?> </li>
            <li>Email adress: <?= $customer->emailAdress ?> </li>
            <?php // voor ? is check, na ? is 'true' : 'false'  ?>
            <li>Credit worthy: <?= $customer->creditWorthy == 1 ? 'Yes' : "No" ; ?> </li>
            <li>Bank account number: <?= $customer->bankAccountNumber ?> </li>

        </ul>

        <div class="edit-button">
            <a href="edit.php?id=<?= $customer->id ?>">Edit</a>
        </div>
    </main>
</div>







<?php require_once __DIR__ . '/../../footer.php'; ?>



