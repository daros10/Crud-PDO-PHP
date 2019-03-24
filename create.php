<?php
    require 'db.php';

    //$message = '';
    $_SESSION["reg"] = '';

    if( isset($_POST['name']) && isset($_POST['email']) ){
        //echo 'button pressed to SUBMITTED';
        $name = $_POST['name'];
        $email = $_POST['email'];

        /*************** QUERY INSERT POSTGRESQL WITH PDO **************************/
            /*$sql = "INSERT INTO PEOPLE(name, email) VALUES(:name, :email)";
            $statement = $connection -> prepare($sql);
            $statement -> execute([':name' => $name, ':email' => $email]);
            $result = $statement;
                if($result){
                    $message = 'Data insert succesfully';
                }*/
        $sql = "INSERT INTO PEOPLE(name, email) VALUES(:name, :email)";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array(
            ':name' => $name,
            ':email' => $email));
        $_SESSION["reg"] = "Data insert succesfully";
        /**************************************************************************/
    }
?>

<?php require 'header.php'; ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
            <h2>Create person</h2>
            </div>
                <div class="card-body">
                        <?php if(!empty($_SESSION["reg"])): ?>
                        <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?= $_SESSION["reg"]; ?> <!-- esto es equivalente a escribir ?php echo ($message) -->
                        </div>
                        <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-info">Create a person</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

<?php require 'footer.php'; ?>