<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: Damian, Maarten, PROPS TO: j
 * Date: 8-11-2015
 * Time: 17:09
 */

$sql = "SELECT tbl_projects.*, tbl_customers.companyName, tbl_invoices.* FROM tbl_projects
        LEFT JOIN tbl_invoices
        ON tbl_projects.id = tbl_invoices.projectID
        LEFT JOIN tbl_customers
        ON tbl_projects.customerID = tbl_customers.id
        WHERE tbl_projects.customerID = :id";

$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$data = $q->fetch(PDO::FETCH_OBJ);



?>


    <div class="container">

        <header>
            <div class="header-welcome">
                <img src="../../img/banner.jpg" alt="banner">
            </div>
        </header>
        <?php require_once __DIR__ . '/../../aside.php'; ?>
        <main>
            <div class="show-project">
                <h2><?= $data->companyName ?> - Project: <?= $data->id ?></h2>

                <?php
                var_dump($data);
                die();
                ?>

                <ul>
                    <li>Description: <?= $data->description ?></li>
                    <li>ID: <?= $data->projectID ?></li>
                    <li>Customer ID: <?= $data->customerID ?></li>
                    <li>Company name: <?= $data->companyName ?> </li>
                    <li>Created at: <?= $data->createdAt ?> </li>
                    <li>Updated at: <?= empty ($data->updatedAt) ? '<i> not updated </i>' : $data->updatedAt ?></li>
                    <li>Deleted at: <?= empty ($data->deletedAt) ? '<i> not deleted </i>' : $data->deletedAt ?></li>
                    <li>Deadline: <?= $data->deadline ?></li>
                    <li>Project finish: <?= empty ($data->projectFinish) ? '<i> not finished </i>' : $data->projectFinish ?> </li>
                    <li>Project price: <?= $data->projectPrice ?> </li>
                    <li>Operating system: <?= $data->operatingSystem ?> </li>
                </ul>

                <li><a href="http://localhost/barrocitprogram/BarrocITProgram/public/views/projects/edit.php">Edit Project</a></li>

            </div>

            <div class="show-invoice">
                <h2>Invoice</h2>
                <ul>
                    <li>ID: <?= $data->id ?></li>
                </ul>

            </div>
        </main>
    </div>



<?php require_once __DIR__ . '/../../footer.php';