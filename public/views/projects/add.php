<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:54
 */

$sql = "SELECT * FROM tbl_customers WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$customer = $q->fetch(PDO::FETCH_OBJ);

?>

<form class="col-md-4 col-md-push-4" action="../../../app/controllers/customerController.php" method="POST">
    <h1 class="text-center"">Add project</h1>

    <input type="hidden" name="type" value="addProject"/>
    <input type="hidden" name="customerID" value="<?= $_GET['id']; ?>">

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="deadline">Deadline</label>
        <input type="text" name="deadline" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="projectPrice">Project price</label>
        <input type="text" name="projectPrice" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="operatingSystem">Operating system</label>
        <input type="text" name="operatingSystem" class="form-control" required/>
    </div>


    <input type="submit" value="Add project" class="btn btn-success"/>
</form>






<?php require_once __DIR__ . '/../../header.php'; ?>
