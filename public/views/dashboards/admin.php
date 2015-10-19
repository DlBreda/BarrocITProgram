<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:54
 */

if ($_SESSION['id'] != '1')
{

    //dit slaat nergens op

    header('location:' . HTTP_PATH . '/public');

}

?>

<div class="container">
    <header>
        <div class="header-welcome">
        </div>
    </header>
    <?php require_once __DIR__ . '/../../aside.php'; ?>
    <main>
        <h1>Notificaties</h1>
        <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat eum repellat dolore laudantium molestiae ab vitae deleniti aliquid, dolorum accusantium laboriosam debitis asperiores cum vel eos placeat facilis velit. Eaque.
        </div>
    </main>
</div>

<?php require_once __DIR__ . '/../../footer.php'; ?>

