<?php
    require 'db.php';

    $id = $_GET["id"];
    $sql = "SELECT * FROM people WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);
    $person = $stmt->fetch();

    if( isset($_POST['name']) && isset($_POST['email']) ){
        //echo 'button pressed to SUBMITTED';
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE PEOPLE SET name=:name, email=:email where id=:id";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':id' =>  $id
        ));
        $_SESSION["update"] = "Data update succesfully";
        /**************************************************************************/
    }
?>

<?php require 'header.php'; ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
            <h2>Update person</h2>
            </div>
                <div class="card-body">
                        <?php if(!empty($_SESSION["update"])): ?>
                        <?php  header("Location: index.php") ?>
                        <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input value="<?=$person["name"]?>" type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="name">Email</label>
                        <input value="<?=$person["email"]?>" type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-info">Update a person</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

<?php require 'footer.php'; ?>