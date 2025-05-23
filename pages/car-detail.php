<?php require_once __DIR__ . "/../includes/header.php"; ?>

<?php
// Database configuratie
include 'database/db.php';

$sql = "SELECT * FROM rental_database";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental Cars</title>
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Car Rental Overview</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Auto</th>
            <th>Type</th>
            <th>Liter</th>
            <th>Passagiers</th>
            <th>Versnellingsbak</th>
            <th>Prijs (€)</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["Id"] ?></td>
                    <td><?= $row["Auto"] ?></td>
                    <td><?= $row["Type"] ?></td>
                    <td><?= $row["Liter"] ?></td>
                    <td><?= $row["Passagiers"] ?></td>
                    <td><?= $row["Versnellingsbak"] ?></td>
                    <td><?= $row["€ Prijs"] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">No cars found.</td></tr>
        <?php endif; ?>

    </table>
</body>
</html>

<?php $conn->close(); ?>


<?php require_once __DIR__ . "/../includes/footer.php"; ?>
