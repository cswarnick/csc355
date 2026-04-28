<!-- Matthew Voisey -->

<!-- SQL QUERY:
 

SELECT Player_FName, Player_LName, SUM(Sacks) AS Career_Sacks
FROM Player NATURAL JOIN DefensiveStats
GROUP BY PlayerID, Player_FName, Player_LName
HAVING SUM(Sacks) > 0
ORDER BY Career_Sacks DESC; 
-- Displays the total sacks for each player-->


<?php

	try{
		require_once('../pdo_connect.php'); //Connect to the database which is outside public_html
		$sql = 
		'Select Player_FName, Player_LName, SUM(Sacks) AS Career_Sacks
		FROM Player NATURAL JOIN DefensiveStats
		GROUP BY PlayerID, Player_FName, Player_LName
		HAVING SUM(Sacks) > 0
		ORDER BY Career_Sacks DESC';
		
		$result = $dbc-> query($sql);
		
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Career Sacks</title>
	<meta charset = "utf-8">
	</head>
<body>
	<h2>Players total career sacks</h2>
		
	<table>
		<tr>
			<th>Player First Name</th>
			<th>Player Last Name</th>
			<th>Career Sacks</th>
		</tr>
		
		<?php 
		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>".$row['Player_FName']."</td>"; 
			echo "<td>".$row['Player_LName']."</td>"; 
			echo "<td>".$row['Career_Sacks']."</td>"; 
			echo "</tr>";
		}
		?>
		</table>
</body>
</html>
				
			
