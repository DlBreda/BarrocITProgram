<?php require_once __DIR__ . '/header.php'; ?>

<div class="container-login">
    <header>
        <img src="img/logo.png" height="250" width="240" alt="">
    </header>
    <div class="main-login">
        <div class="form-group login-border" >
            <form action="<?= HTTP_PATH . 'app/controllers/authController.php' ?>" method="post" style="margin-top: 20px;">
                <input type="hidden" value="login" name="type">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <input class="btn btn-primary pull-right" type="submit" value="Login">
            </form>
        </div>
    </div>
    <footer>
        <div class="copyright">

        </div>
    </footer>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
