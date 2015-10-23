<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:54
 */

if ($_SESSION['id'] != '4')
{
    header('location:' . HTTP_PATH . 'public/');
}

?>

<div class="container">
    <header>
        <div class="header-welcome">
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
            <form id="search" name="search">
                <input name="search" type="text" placeholder="Search">
                <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
        <div class="content invoices-content">
            <table class="table table-bordered invoices invoices-clients">
                <tr>
                    <th class="th-project-header">Nieuwe projecten</th>
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
        </div>
    </main>
</div>

<?php require_once __DIR__ . '/../../footer.php'; ?>
