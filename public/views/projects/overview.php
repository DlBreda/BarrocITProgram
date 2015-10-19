<?php require_once __DIR__ . '/../../header.php';

$sql = "SELECT companyName, contactPerson, count(tbl_projects.id) as totalProjects
            FROM tbl_customers
            LEFT JOIN tbl_projects
            ON tbl_projects.customerID = tbl_customers.id
            GROUP BY tbl_customers.id";
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
        <?php require_once __DIR__ . '/../../aside.php'; ?>
            <main>
                <div class="invoices-top">
                    <h3>Customer overview</h3>
                    <form id="search" name="search">
                        <input name="search" type="text" placeholder="Search">
                        <button type="submit"><span class="glyphicon glyphicon-search"></span> </button>
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
                                    <td><a href="show.php"><?= $customer['companyName']; ?></a></td>
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