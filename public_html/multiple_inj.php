<!-- Matthew Voisey -->

<!-- SQL QUERY:
 
SELECT Player_FName, Player_LName, Count(*) AS Injury_Count
FROM Player NATURAL JOIN Injury
GROUP BY PlayerID, Player_FName, Player_LName
HAVING Count(*) > 1
ORDER BY Injury_Count DESC; 
-- Players with more than 1 injury -->




<?php

	try{
		require_once('../pdo_connect.php'); //Connect to the database which is outside public_html
		$sql = 
		'SELECT Player_FName, Player_LName, COUNT(*) AS Injury_Count
		FROM Player NATURAL JOIN Injury
		GROUP BY PlayerID, Player_FName, Player_LName
		Having COUNT(*) > 1
		ORDER BY Injury_Count DESC';
		
		$result = $dbc-> query($sql);
		
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Injury Count</title>
	<meta charset = "utf-8">
	</head>
<body>
	<h2>Players with Multiple Injuries</h2>
		
	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Injury Count</th>
		</tr>
		
		<?php 
		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>".$row['Player_FName']."</td>"; 
			echo "<td>".$row['Player_LName']."</td>"; 
			echo "<td>".$row['Injury_Count']."</td>"; 
			echo "</tr>";
		}
		?>
		</table>
</body>
</html>
				
			