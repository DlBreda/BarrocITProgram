<?php require_once __DIR__ . '/../../header.php';
/**
 * Created by PhpStorm.
 * User: K
 * Date: 15-10-2015
 * Time: 10:13
 */

$sql = "SELECT * FROM tbl_projects WHERE id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $_GET['id']);
$q->execute();

$project = $q->fetch(PDO::FETCH_OBJ);

$allowed = [1,2];

if (! in_array($_SESSION['id'], $allowed) ){

    $messageBag->add('a', 'Not allowed to edit a Project');
    header('location: ' . HTTP_PATH . '/public/views/customers/overview.php');

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
        <h2>Edit project</h2>
        <form class="col-md-4 col-md-push-4" action="<?= HTTP_PATH . '/app/controllers/customerController.php'?>" method="POST">

            <?php var_dump($_GET['id']);
            die();?>

            <input type="hidden" name="type" value="editProject"/>
            <input type="hidden" name="id" value="<?= $project->id; ?>">

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" value="<?= $project->description ?>" required/>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="text" name="deadline" class="form-control" value="<?= $project->deadline ?>"/>
            </div>

            <div class="form-group">
                <label for="projectPrice">Project price</label>
                <input type="text" name="projectPrice" class="form-control" value="<?= $project->projectPrice ?>" required/>
            </div>

            <div class="form-group">
                <label for="operatingSystem">Operating system</label>
                <input type="text" name="operatingSystem" class="form-control" value="<?= $project->operatingSystem ?>" required/>
            </div>


            <input type="submit" value="Edit project" class="btn btn-success"/>
        </form>
    </main>
</div>


