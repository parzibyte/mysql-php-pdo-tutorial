<?php
if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "database.php";
$statement = $database->prepare("SELECT * FROM person WHERE id = ?;");
$statement->execute([$id]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if ($person === false) {
    #not found
    echo "Person not found!";
    exit();
}

#If the person exists, this code is executed
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit person</title>
</head>
<body>
	<form method="post" action="update.php">
		<!-- Put the id hidden in the form so we can use it later -->
		<input type="hidden" name="id" value="<?php echo $person->id; ?>">

		<label for="nombre">Name:</label>
		<br>
		<input value="<?php echo $person->first_name ?>" name="first_name" required type="text" id="first_name" placeholder="First name">
		<br><br>
		<label for="last_name">Last name:</label>
		<br>
		<input value="<?php echo $person->last_name ?>" name="last_name" required type="text" id="last_name" placeholder="Last name">
		<br><br>
		<label for="gender">Gender</label>
		<select name="gender" required name="gender" id="gender">
			<!--
			Para seleccionar una opción con defecto, se debe poner el atributo selected.
			Usamos el operador ternario para que, si es esa opción, marquemos la opción seleccionada
			 -->
			<option value="">--Please select--</option>
			<option <?php echo $person->gender === 'M' ? "selected='selected'" : "" ?> value="M">Male</option>
			<option <?php echo $person->gender === 'F' ? "selected='selected'" : "" ?> value="F">Female</option>
		</select>
		<br><br><input type="submit" value="Save">
	</form>
</body>
</html>