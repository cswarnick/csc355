<?php
	ini_set('error_reporting', 1);

	try {
		require_once('../pdo_connect.php');
		$sql = 'SELECT Player_FName, Player_LName, Season, Touchdowns
				FROM Player NATURAL JOIN OffensiveStats
				ORDER BY Player_LName, Player_FName, Season';
		$result = $dbc->query($sql);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Player Touchdowns Per Season</title>
    <meta charset="utf-8">
    <!-- Connor Warnick -->
</head>
<body>
    <h2>Players' touchdowns each season</h2>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Season</th>
            <th>Touchdowns</th>
        </tr>
        <?php foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['Player_FName'] . "</td>";
            echo "<td>" . $row['Player_LName'] . "</td>";
            echo "<td>" . $row['Season'] . "</td>";
            echo "<td>" . $row['Touchdowns'] . "</td>";
            echo "</tr>";
        } ?>
    </table>
</body>
</html>