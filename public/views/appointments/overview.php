<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 13-10-2015
 * Time: 22:43
 */

if ( isset($_GET['type']) && $_GET['type'] == 'inactive' ) {
    // inactieve klanten
    $sql = "SELECT tbl_customers.id, companyName, contactPerson, tbl_projects.deadline as deadline, count(tbl_projects.id) as totalProjects
            FROM tbl_customers
            LEFT JOIN tbl_projects
            ON tbl_projects.customerID = tbl_customers.id
            LEFT JOIN tbl_appointments
            ON tbl_projects.id = tbl_appointments.projectID
            GROUP BY companyName
            HAVING `deadline` < NOW() || totalProjects = 0" ;
} else {
    // actieve klanten
    $sql = "SELECT tbl_customers.id, companyName, contactPerson, tbl_projects.deadline as deadline, count(tbl_projects.id) as totalProjects
            FROM tbl_customers
            LEFT JOIN tbl_projects
            ON tbl_projects.customerID = tbl_customers.id
            LEFT JOIN tbl_appointments
            ON tbl_projects.id = tbl_appointments.projectID
            GROUP BY companyName
            HAVING `deadline` > NOW()" ;
}


$q = $db->query($sql);
if ( $q->rowCount() > 0 )
{
    $customers = $q->fetchAll();
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
            <?php
            if($messageBag->hasMsg()) {
                echo $messageBag->show();
            }
            ?>
            <div class="invoices-top">
                <h3>Customer overview</h3>
                <h3><a href="add.php"> Add apointments</a></h3>
                <form id="search" name="search">
                    <input name="search" type="text" placeholder="Search">
                    <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </div>
            <div class="content invoices-content">
                <table class="table table-bordered invoices invoices-clients">
                    <tr>
                        <th>Company name</th>
                        <th>Contact person</th>
                        <th>All projects</th>
                    </tr>
                    <?php if ( isset($customers) ): ?>
                        <?php foreach( $customers as $customer ): ?>
                            <tr>
                                <td><a href="<?= 'show.php?id=' . $customer['id']; ?>"> <?= $customer['companyName']; ?></a></td>
                                <td><?= $customer['contactPerson']; ?></td>
                                <td><?= $customer['totalProjects']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>

                <div class="active-inactive">

                    <?php if (isset($_GET['type']) && $_GET['type'] == 'inactive'): ?>
                        <a href="overview.php">View active customers</a>
                    <?php else: ?>
                        <a href="overview.php?type=inactive">View inactive customers</a>
                    <?php endif; ?>
                </div>



            </div>
        </main>
    </div>

<?php require_once __DIR__ . '/../../footer.php'; ?>