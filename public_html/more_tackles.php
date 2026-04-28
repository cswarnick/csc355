<!-- Matthew Voisey -->

<!-- SQL QUERY:
 
SELECT Player_FName, Player_LName, Season, Tackles
FROM `Player` NATURAL JOIN `DefensiveStats`
WHERE Tackles > (SELECT MAX(Tackles) FROM `Player` 
NATURAL JOIN `DefensiveStats` 
WHERE Player_FName = "Travis" AND Player_LName = "Kelce");

--Players that have gotten more tackles than Travis Kelce-->



<?php

	try{
		require_once('../pdo_connect.php'); //Connect to the database which is outside public_html
		$sql = 
		'Select Player_FName, Player_LName, Season, Tackles
		FROM Player NATURAL JOIN DefensiveStats
		WHERE Tackles > (Select MAX(TACKLES) FROM Player NATURAL JOIN DefensiveStats
		WHERE Player_FName = "Travis" AND Player_LName = "Kelce")'
		;
		
		$result = $dbc-> query($sql);
		
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>More Tackles</title>
	<meta charset = "utf-8">
	</head>
<body>
	<h2>Players with more tackles than Travis Kelce</h2>
		
	<table>
		<tr>
			<th>Player First Name</th>
			<th>Player Last Name</th>
			<th>Season</th>
			<th>Tackles</th>
		</tr>
		
		<?php 
		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>".$row['Player_FName']."</td>"; 
			echo "<td>".$row['Player_LName']."</td>"; 
			echo "<td>".$row['Season']."</td>"; 
			echo "<td>".$row['Tackles']."</td>";
			echo "</tr>";
		}
		?>
		</table>
</body>
</html>
				
			