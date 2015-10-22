<?php
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:13
 */
?>

<?php require_once __DIR__ . '/../../header.php'; ?>


<form class="col-md-4 col-md-push-4" action="../../../app/controllers/customerController.php" method="POST">
    <h1 class="text-center"">Add Contact</h1>

    <input type="hidden" name="type" value="add"/>

    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstName" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="phone">Insertion</label>
        <input type="text" name="insertion" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastName" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="emailAdress" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="phone">Phone number</label>
        <input type="text" name="phoneNumber" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="phone">Company name</label>
        <input type="text" name="companyName" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="phone">Adress</label>
        <input type="text" name="adress" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="phone">Postal zip</label>
        <input type="text" name="postalZip" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="phone">Adress 2</label>
        <input type="text" name="adress2" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="phone">Postal zip 2</label>
        <input type="text" name="postalZip2" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="phone">Contact person</label>
        <input type="text" name="contactPerson" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="phone">Fax number</label>
        <input type="text" name="faxNumber" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="phone">Potentional customer</label>
        </br>
        <input type="radio" name="potentionalCustomer" value="<?= 1; ?>" class="" /> <p style="float: left; margin-right: 10px; margin-bottom: 0px;">Yes</p>
        </br>
        <input type="radio" name="potentionalCustomer" value="<?= 0; ?>" class=""/> <p style="float: left; margin-right: 16px;">No</p>
    </div>

    <div class="form-group">
        <label for="phone">Credit worthy</label>
        </br>
        <input type="radio" name="creditWorthy" value="<?= 1; ?>" class="" /> <p style="float: left; margin-right: 10px; margin-bottom: 0px;">Yes</p>
        </br>
        <input type="radio" name="creditWorthy" value="<?= 0 ?>" class=""/> <p style="float: left; margin-right: 16px;">No</p>
    </div>

    <div class="form-group">
        <label for="phone">Bank account number</label>
        <input type="text" name="bankAccountNumber" value="" class="form-control"/>
    </div>

    <input type="submit" value="Create user" class="btn btn-primary"/>
</form>



<?php require_once __DIR__ . '/../../footer.php'; ?>
