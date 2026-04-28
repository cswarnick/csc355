<!-- Matthew Voisey -->

<!-- SQL QUERY:
 
SELECT PlayerID, S_ID, S_Role
FROM `Player` NATURAL JOIN `PlayerTeam` NATURAL JOIN `TeamStaff` NATURAL JOIN `Staff`
ORDER BY PlayerID;
--Players and their staff -->

<?php
try {
    require_once('../pdo_connect.php');

    $sql = 'SELECT a.PlayerID AS Player1,
                   b.PlayerID AS Player2,
                   T_Name,
                   a.Date_Joined
            FROM Team
            JOIN PlayerTeam AS a ON Team.T_ID = a.T_ID
            JOIN PlayerTeam AS b ON a.T_ID = b.T_ID
            WHERE YEAR(a.Date_Joined) = YEAR(b.Date_Joined)
              AND a.PlayerID < b.PlayerID
            ORDER BY T_Name, a.Date_Joined';

			$result = $dbc->query($sql);

	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Players Joined Same Team Same Year</title>
    <meta charset="utf-8">
	</head>

<body>
    <h2>Players That Joined the Same Team in the Same Year</h2>

    <table>
        <tr>
            <th>Player 1 ID</th>
            <th>Player 2 ID</th>
            <th>Team Name</th>
            <th>Date Joined</th>
        </tr>

        <?php
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['Player1'] . "</td>";
            echo "<td>" . $row['Player2'] . "</td>";
            echo "<td>" . $row['T_Name'] . "</td>";
            echo "<td>" . $row['Date_Joined'] . "</td>";
            echo "</tr>";
        }
        ?>
		</table>
</body>
</html>