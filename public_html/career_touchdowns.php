<!-- Matthew Voisey -->

<!-- SQL QUERY:
 
SELECT Player_FName, Player_LName, total_touchdowns(Player.PlayerID)
FROM Player


--Players career total touchdowns. Uses stored function "total_touchdowns"-->




<?php

	try{
		require_once('../pdo_connect.php'); //Connect to the database which is outside public_html
		$sql = 
		'Select Player_FName, Player_LName, total_touchdowns(Player.PlayerID) AS career_touchdowns
		FROM Player
		ORDER BY career_touchdowns DESC';
		
		$result = $dbc-> query($sql);
		
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Career Touchdowns</title>
	<meta charset = "utf-8">
	</head>
<body>
	<h2>Players total career touchdowns</h2>
		
	<table>
		<tr>
			<th>Player First Name</th>
			<th>Player Last Name</th>
			<th>Career Touchdowns</th>
		</tr>
		
		<?php 
		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>".$row['Player_FName']."</td>"; 
			echo "<td>".$row['Player_LName']."</td>"; 
			echo "<td>".$row['career_touchdowns']."</td>"; 
			echo "</tr>";
		}
		?>
		</table>
</body>
</html>
				
			