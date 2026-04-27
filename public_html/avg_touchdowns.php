<?php
	ini_set('error_reporting', 1);

	try {
		require_once('../pdo_connect.php');
		$sql = 'SELECT AVG(Touchdowns) AS Avg_Touchdowns FROM OffensiveStats';
		$result = $dbc->query($sql);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Average Touchdowns</title>
    <meta charset="utf-8">
    <!-- Connor Warnick -->
</head>
<body>
    <h2>Average touchdowns per season across all offensive players</h2>

    <table>
        <tr>
            <th>Average Touchdowns</th>
        </tr>
        <?php foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . number_format($row['Avg_Touchdowns'], 2) . "</td>";
            echo "</tr>";
        } ?>
    </table>
</body>
</html>