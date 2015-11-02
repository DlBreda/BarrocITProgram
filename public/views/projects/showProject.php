<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 2-11-2015
 * Time: 10:09
 */

$sql = "SELECT tbl_projects.*, tbl_customers.companyName FROM tbl_projects
        LEFT JOIN tbl_customers
        ON tbl_projects.customerID = tbl_customers.id
        WHERE tbl_projects.id = :id";

$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$project = $q->fetch(PDO::FETCH_OBJ);

?>


    <div class="container">
    <header>
        <div class="header-welcome">

        </div>
    </header>
<?php require_once __DIR__ . '/../../aside.php'; ?>
        <main>
            <div class="show-project">
                <h2><?= $project->companyName ?> - Project: <?= $project->id ?></h2>

                <ul>
                    <li>Description: <?= $project->description ?></li>
                    <li>ID: <?= $project->id ?></li>
                    <li>Customer ID: <?= $project->customerID ?></li>
                    <li>Company name: <?= $project->companyName ?> </li>
                    <li>Created at: <?= $project->createdAt ?> </li>
                    <li>Updated at: <?= empty ($project->updatedAt) ? '<i> not updated </i>' : $project->updatedAt ?></li>
                    <li>Deleted at: <?= empty ($project->deletedAt) ? '<i> not deleted </i>' : $project->deletedAt ?></li>
                    <li>Deadline: <?= $project->deadline ?></li>
                    <li>Project finish: <?= empty ($project->projectFinish) ? '<i> not finished </i>' : $project->projectFinish ?> </li>
                    <li>Project price: <?= $project->projectPrice ?> </li>
                    <li>Operating system: <?= $project->operatingSystem ?> </li>
                </ul>
            </div>
        </main>
    </div>



<?php require_once __DIR__ . '/../../footer.php';