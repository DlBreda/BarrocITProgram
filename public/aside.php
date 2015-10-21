<?php
switch ($_SESSION['id']) {
    case 1: ?>
        <aside>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/customers/overview.php' ?>">Custommers</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/projects/overview.php' ?>">Projects</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/invoices/overview.php' ?>">Invoices</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/appointments/adminAppointments.php' ?>">Appointments</a></li>
            </ul>

            <div class="bottom-aside">
                <ul>
                    <form action="<?= HTTP_PATH . 'app/controllers/authController.php';?>" method="POST">
                        <input name="type" type="hidden" value="logout"/>
                        <input class="btn-logout" type="submit" value="Uitloggen"/>
                    </form>
                    <li><?= $_SESSION['username'];?></li>
                </ul>
            </div>
        </aside>
        <?php
        break;

    case 2:?>
        <aside>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/customers/overview.php' ?>">Customers</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/projects/overview.php' ?>">Projects</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/invoices/overview.php' ?>">Invoices</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/appointments/salesAppointments.php' ?>">Appointments</a></li>
            </ul>

            <div class="bottom-aside">
                <ul>
                    <li><a href="">Log out</a></li>
                    <li><?= $_SESSION['username'];?></li>
                </ul>
            </div>
        </aside>
        <?php
        break;

    case 3:?>
        <aside>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/customers/overview.php' ?>">Sales</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/projects/overview.php' ?>">Sales</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/invoices/overview.php' ?>">Invoices</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/appointments/financeAppointments.php' ?>">Appointments</a></li>
            </ul>

            <div class="bottom-aside">
                <ul>
                    <li><a href="">Log out</a></li>
                    <li><?= $_SESSION['username'];?></li>
                </ul>
            </div>
        </aside>
        <?php
        break;

    case 4:?>
        <aside>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/customers/overview.php' ?>">Sales</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/projects/overview.php' ?>">Sales</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/invoices/overview.php' ?>">Invoices</a></li>
                <li><a href="<?= HTTP_PATH . 'public/views/appointments/developmentAppointments.php' ?>">Appointments</a></li>
            </ul>

            <div class="bottom-aside">
                <ul>
                    <li><a href="">Log out</a></li>
                    <li><?= $_SESSION['username'];?></li>
                </ul>
            </div>
        </aside>
        <?php
        break;

    default:
        header('location:' . HTTP_PATH . 'public/');

}
?>


