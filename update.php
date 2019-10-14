<?php

#If one of these are not present, exit
if (
    !isset($_POST["first_name"]) ||
    !isset($_POST["last_name"]) ||
    !isset($_POST["gender"]) ||
    !isset($_POST["id"])
) {
    exit();
}

#If everything is OK, this code is executed

include_once "database.php";
$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$gender = $_POST["gender"];

$statement = $database->prepare("UPDATE person SET first_name = ?, last_name = ?, gender = ? WHERE id = ?;");
$result = $statement->execute([$first_name, $last_name, $gender, $id]); # Pass data in the same order as placeholders
if ($result === true) {
    echo "Saved";
} else {
    echo "Something went wrong";
}
