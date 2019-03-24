<?php
require 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM PEOPLE WHERE id=:id";
$stmt = $connection->prepare($sql);
$stmt->execute([
    ':id' => $id
]);
if($stmt){
    header("Location: index.php");
}

?>