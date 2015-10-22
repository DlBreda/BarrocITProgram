<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: Maarten
 * Date: 22-10-2015
 * Time: 09:50
 */

?>

<form class="col-md-4 col-md-push-4" action="../../../app/controllers/customerController.php" method="POST">
    <h1 class="text-center"">Add Invoices</h1>

    <input type="hidden" name="type" value="add"/>

    <div class="form-group">
        <label for="firstname">Created at</label>
        <input type="text" name="createdAt" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="lastname">Deleted at</label>
        <input type="text" name="deletedAt" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="email">Description</label>
        <input type="text" name="description" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="phone">Price</label>
        <input type="text" name="price" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="phone">Paid</label>
        </br>
        <input type="radio" name="Paid" value="<?= 1; ?>" class="" /> <p style="float: left; margin-right: 10px; margin-bottom: 0px;">Yes</p>
        </br>
        <input type="radio" name="Paid" value="<?= 0; ?>" class=""/> <p style="float: left; margin-right: 16px;">No</p>
    </div>

    <div class="form-group">
        <label for="phone">Send</label>
        </br>
        <input type="radio" name="Send" value="<?= 1; ?>" class="" /> <p style="float: left; margin-right: 10px; margin-bottom: 0px;">Yes</p>
        </br>
        <input type="radio" name="Send" value="<?= 0 ?>" class=""/> <p style="float: left; margin-right: 16px;">No</p>
    </div>

    <input type="submit" value="Add invoice" class="btn btn-primary"/>
</form>


<?php require_once __DIR__ . '/../../footer.php';
