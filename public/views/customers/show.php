<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:12
 */

$sql = "SELECT * FROM tbl_customers";
$q = $db->query($sql);

?>

<div class="container">
    <header>
        <div class="header-welcome">

        </div>
    </header>
    <?php require_once __DIR__ . '/../../aside.php'; ?>
    <main>
        <h3><?php  ?></h3>
    </main>
</div>







<?php require_once __DIR__ . '/../../footer.php'; ?>



