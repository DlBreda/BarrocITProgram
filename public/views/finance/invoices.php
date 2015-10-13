<?php require_once __DIR__ . '/../../header.php';
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
            </div>
            <div class="content invoices-content">
                <ul class="invoices invoices-clients">
                    <li ><a href="">klant</a></li>
                    <li><a href="">klant</a></li>
                    <li><a href="">klant</a></li>
                    <li><a href="">klant</a></li>
                </ul>
            </div>
        </main>
        <main class="main-box">
            <div class="check">
                <h4>inactief</h4>
                    <form action=check-box">
                        <ul>
                            <li><input type="checkbox" value="active"></li>
                            <li><input type="checkbox" value="active"></li>
                            <li><input type="checkbox" value="active"></li>
                            <li><input type="checkbox" value="active"></li>
                        </ul>
                    </form>
            </div>
            <div class="check">
                <h4>BKR</h4>
                <form action=check-box">
                    <ul>
                        <li><input type="checkbox" value="bkr"></li>
                        <li><input type="checkbox" value="bkr"></li>
                        <li><input type="checkbox" value="bkr"></li>
                        <li><input type="checkbox" value="bkr"></li>
                    </ul>

                </form>
            </div>


        </main>
    </main>
</div>

<?php require_once __DIR__ . '/../../footer.php'; ?>