<?php require_once __DIR__ . '/../../header.php';

$sql = "SELECT * FROM tbl_customers";
$q = $db->query($sql);
if ( $q->rowCount() > 0 )
{
    $customers = $q->fetchAll();
}

/**
 * Created by PhpStorm.
 * User: K
 * Date: 13-10-2015
 * Time: 10:05
 */
 ?>

<div class="container">
    <header>
        <div class="header-welcome">
        </div>
    </header>
    <?php require_once __DIR__ . '/../aside.php'; ?>
    <main>
        <main class="invoices-main">
            <div class="invoices-top">
                <h3><a href="new-invoice.php">New invoice</a></h3>
                <form id="search" name="search">
                    <input name="search" type="text" placeholder="Search">
                    <button type="submit"><span class="glyphicon glyphicon-search"></span> </button>
                </form>
            </div>
            <div class="content invoices-content">
                <table class="table table-bordered invoices invoices-clients">
                    <tr>
                        <th>Company name</th>
                        <th>Inactive</th>
                        <th>BKR registered</th>
                    </tr>
                    <?php if ( isset($customers) ): ?>
                        <?php foreach( $customers as $customer ): ?>
                            <tr>
                            <td><?= $customer['companyName'] ?></td>
                                <form action="" method="post">
                                    <td><input type="checkbox" name="active" id=""></td>
                                    <td><input type="checkbox" name="bkr" id=""></td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>
        </main>
    </main>
</div>

<?php require_once __DIR__ . '/../../footer.php'; ?>