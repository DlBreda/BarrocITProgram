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

    <input type="hidden" name="type" value="addInvoice"/>

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
        <input type="text" name="paid" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="phone">Sent</label>
        <input type="text" name="sent" class="form-control" required/>
    </div>

    <input type="submit" value="Add invoice" class="btn btn-primary"/>
</form>


<?php require_once __DIR__ . '/../../footer.php';
