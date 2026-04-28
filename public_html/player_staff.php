<!-- Matthew Voisey -->

<!-- SQL QUERY:
 
SELECT PlayerID, S_ID, S_Role
FROM `Player` NATURAL JOIN `PlayerTeam` NATURAL JOIN `TeamStaff` NATURAL JOIN `Staff`
ORDER BY PlayerID;
--Players and their staff -->


<?php

	try{
		require_once('../pdo_connect.php'); //Connect to the database which is outside public_html
		$sql = 'Select PlayerID, Player_LName, S_ID, S_Role
		FROM Player
		NATURAL JOIN PlayerTeam
		NATURAL JOIN TeamStaff
		NATURAL JOIN Staff
		ORDER BY PlayerID';
		
		$result = $dbc-> query($sql);
		
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Players and their Staff</title>
	<meta charset = "utf-8">
	</head>
<body>
	<h2>Players and the staff that coached them.</h2>
		
	<table>
		<tr>
			<th>Player ID</th>
			<th>Last Name</th>
			<th>Staff ID</th>
			<th>Staff Role</th>
		</tr>
		
		<?php 
		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>".$row['PlayerID']."</td>"; /* PlayerID is the name of the attribute in the table. */
			echo "<td>".$row['Player_LName']."</td>"; /*Player_LName is the name as it appears in the table. */
			echo "<td>".$row['S_ID']."</td>"; /* S_ID is the name of attritube as it appears in the table. */
			echo "<td>".$row['S_Role']."</td>"; /* S_Role is the name of the attribute as it appears in the table. */
			echo "</tr>";
		}
		?>
		</table>
</body>
</html>
				
			