<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
	<style>
		table, th, td {
          padding: .5em 1em;
		  border: 1px solid black;
		  border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h1>User List</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Profile Picture</th>
		</tr>
		<?php
		// Display user data from CSV file in table
		if (($fp = fopen("users.csv", "r")) !== false) {
		    while (($data = fgetcsv($fp, 1000, ",")) !== false) {
		        echo "<tr>";
		        echo "<td>".$data[0]."</td>";
		        echo "<td>".$data[1]."</td>";
		        echo "<td><img src='".$data[2]."' height='100'></td>";
		        echo "</tr>";
		    }
		    fclose($fp);
		}
		?>
	</table>
</body>
</html>
