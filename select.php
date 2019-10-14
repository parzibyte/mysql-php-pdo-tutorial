<?php
include_once "database.php";
$statement = $database->query("SELECT * FROM person;");
$people = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!--We can interpolate HTML and PHP-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>People list</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last name</th>
				<th>Gender</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<!--
				we use foreach to repeat <tr>
					(look at static_table.html)
			-->
			<?php foreach ($people as $person) {?>
			<tr>
				<td><?php echo $person->id ?></td>
				<td><?php echo $person->first_name ?></td>
				<td><?php echo $person->last_name ?></td>
				<td><?php echo $person->gender ?></td>
				<td><a href="<?php echo "edit.php?id=" . $person->id ?>">Edit</a></td>
				<td><a href="<?php echo "delete.php?id=" . $person->id ?>">Delete</a></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</body>
</html>