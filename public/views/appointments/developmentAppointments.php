<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: Maarten
 * Date: 6-11-2015
 * Time: 9:33
 */

if ($_SESSION['id'] != '1')
{

    header('location:' . HTTP_PATH . '/public');

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
        <div class="top-dashboard">
            <h1>Appointment</h1>
            <h3><a href="add.php"> Add customer</a></h3>
        </div>
        <div class="content invoices-content">
            <table class="table table-bordered invoices invoices-clients">
                <tr>
                    <th>Company name</th>
                    <th>Contact person</th>
                    <th>All Appointsments</th>
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

