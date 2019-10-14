<?php
# If one of these fields are not present, exit
if (!isset($_POST["first_name"]) || !isset($_POST["last_name"]) || !isset($_POST["gender"])) {
    exit();
}

# If everything is OK this code is executed

include_once "database.php";
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$gender = $_POST["gender"];

/*
When we include the "database.php" file, all of its variables are present
in the current scope, so we can access "$database" defined in the file
 */
$statement = $database->prepare("INSERT INTO person(first_name, last_name, gender) VALUES (?, ?, ?);");
$result = $statement->execute([$first_name, $last_name, $gender]); # Pasar en el mismo orden de los ?

#execute returns true or false depending on success

if ($result === true) {
    echo "Inserted successfully";
} else {
    echo "Something went wrong";
}
