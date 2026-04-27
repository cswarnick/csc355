<?php
	ini_set('error_reporting', 1);

	try {
		require_once('../pdo_connect.php');
		$sql = 'SELECT T_Name, T_City FROM Team WHERE T_City LIKE "%City" ORDER BY T_Name';
		$result = $dbc->query($sql);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teams by City</title>
    <meta charset="utf-8">
    <!-- Connor Warnick -->
</head>
<body>
    <h2>All teams from a city with "City" in the name</h2>

    <table>
        <tr>
            <th>Team Name</th>
            <th>City</th>
        </tr>
        <?php foreach ($result as $team) {
            echo "<tr>";
            echo "<td>" . $team['T_Name'] . "</td>";
            echo "<td>" . $team['T_City'] . "</td>";
            echo "</tr>";
        } ?>
    </table>
</body>
</html>