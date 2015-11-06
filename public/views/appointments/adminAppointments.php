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
        </div>
        <div class="content appointments-admin">
<!--            CONTENT HERE-->
        </div>
    </main>
</div>
<?php require_once __DIR__ . '/../../footer.php'; ?>

