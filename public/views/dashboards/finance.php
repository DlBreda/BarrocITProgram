<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:54
 */

if ($_SESSION['id'] != '1')
{
    header('location: ');
}

?>

<div class="container">
    <header>
        <div class="header-welcome">
        </div>
    </header>
    <?php require_once __DIR__ . '/../../aside.php'; ?>
    <main>
        <div class="top-dashboard-finance">
            <h1>Trailing invoices</h1>
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
