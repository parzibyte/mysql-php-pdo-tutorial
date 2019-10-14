<?php
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "database.php";
$statement = $database->prepare("DELETE FROM person WHERE id = ?;");
$result = $statement->execute([$id]);
if ($result === true) {
    echo "Deleted";
} else {
    echo "Something went wrong";
}
