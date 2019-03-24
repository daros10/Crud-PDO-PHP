<?php
    require 'db.php';

    $_SESSION["update"] = '';
    
    /************** QUERY SELECT PDO *****************/
    /* http://www.mustbebuilt.co.uk/php/select-statements-with-pdo/ */
    $sql= "SELECT * FROM PEOPLE order by id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $people = $stmt->fetchAll();
    /*************************************************/



?>
<?php require 'header.php'; ?>

    <div class="container">
    <div class="card mt-5">
    <div class="card-header">
    <h2>All People</h2>
    </div>
    <div class="card-body">
        <?php if(!empty($_SESSION['update'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?= $_SESSION["update"]; ?> <!-- esto es equivalente a escribir ?php echo ($message) -->
                        </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach($people as $person): ?>
            <tr>
                <td><?= $person['id']; ?></td>
                <td><?= $person['name']; ?></td>
                <td><?= $person['email']; ?></td>
                <td>
                <a href="edit.php?id=<?=$person['id'];?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure to want to delete this item?')" href="delete.php?id=<?=$person['id'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </div>
    </div>

<?php require 'footer.php'; ?>

 