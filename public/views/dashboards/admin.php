<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:54
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
            <h1>Apointment dates</h1>
        </div>
        <div class="content finance-content">
            <ul class="invoices">
                <li ><a href="">klant - factuur - bedrag</a></li>
                <li><a href="">klant - factuur - bedrag</a></li>
                <li><a href="">klant - factuur - bedrag</a></li>
                <li><a href="">klant - factuur - bedrag</a></li>
            </ul>
        </div>
    </main>
</div>
<?php require_once __DIR__ . '/../../footer.php'; ?>

