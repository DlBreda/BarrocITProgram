<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:54
 */

if ($_SESSION['id'] != '2')
{
    header('location:' . HTTP_PATH . 'public/');
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
        <h1 class="main-n">Notifications</h1>
            <div style="float: right;" id="time"></div>
        <div class="content invoices-content">
            <table class="table table-bordered invoices invoices-clients">
                <tr>
                    <th>Afspraken</th>
                    <th>Klanten</th>
                </tr>
                <?php if ( isset($customers) ): ?>
                    <?php foreach( $customers as $customer ): ?>
                        <tr>
                            <td><a href="show.php"> <?= $customer['companyName']; ?></a></td>
                            <td><?= $customer['contactPerson']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
    </main>
</div>


<?php require_once __DIR__ . '/../../footer.php'; ?>
