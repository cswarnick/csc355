<?php
	ini_set('error_reporting', 1);

	try {
		require_once('../pdo_connect.php');
		$sql = 'SELECT PlayerID, SUM(Passing_Yards) AS Total_Passing_Yards
				FROM Player NATURAL JOIN OffensiveStats
				GROUP BY PlayerID
				HAVING SUM(Passing_Yards) > 0';
		$result = $dbc->query($sql);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Career Passing Yards</title>
    <meta charset="utf-8">
    <!-- Connor Warnick -->
</head>
<body>
    <h2>Players' total career passing yards (players with > 0 passing yards)</h2>

    <table>
        <tr>
            <th>PlayerID</th>
            <th>Total Passing Yards</th>
        </tr>
        <?php foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['PlayerID'] . "</td>";
            echo "<td>" . $row['Total_Passing_Yards'] . "</td>";
            echo "</tr>";
        } ?>
    </table>
</body>
</html>