<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:53
 */


$sql =
    "SELECT tbl_customers.*, tbl_projects.description, tbl_projects.id as project_id FROM tbl_customers
    LEFT JOIN tbl_projects
    ON tbl_projects.customerID = tbl_customers.id
    WHERE tbl_customers.id = :id";

$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$data = $q->fetchAll(PDO::FETCH_OBJ);

$customer = $data[0];
$projects = $data;

?>

<div class="container">
    <header>
        <div class="header-welcome">
            <img src="../../img/banner.jpg" alt="banner">
        </div>
    </header>
     <?php require_once __DIR__ . '/../../aside.php'; ?>
    <main>

    <div class="projects">
       <h2> <?= $customer->companyName; ?> </h2>

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
            <li>Email adress: <?= empty ($customer->emailAdress) ? '<i> no email adress </i>' : $customer->emailAdress ?> </li>
            <?php // voor ? is check, na ? is 'true' : 'false'  ?>
            <li>Credit worthy: <?= $customer->creditWorthy == 1 ? 'Yes' : "No" ; ?> </li>
            <li>Bank account number: <?= $customer->bankAccountNumber ?> </li>

        </ul>
    </div>

    <div class="projects">
        <h2>Projects</h2>
        <ul class="projects-content">
            <?php

                foreach ($projects as $project) {
                    if (!empty($project->description)) {
                        echo '<li><a href="showProject.php?id=' . $project->project_id . ' "> ' . $project->description . '</a></li>';
                    }

                    if (empty($project->description)) {
                        echo "No projects";
                    }
                }
            ?>
        </ul>
    </div>
        </main>

</div>


