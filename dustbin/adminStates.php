<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>States</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>States Table</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">State ID</th>
                    <th scope="col">State Name</th>
                    <th scope="col">ISO</th>
                    <th scope="col">State Capital</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'configdb.php';

                $sql = "SELECT * FROM states";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["State_ID"] . "</td>";
                        echo "<td>" . $row["State_Name"] . "</td>";
                        echo "<td>" . $row["ISO"] . "</td>";
                        echo "<td>" . $row["State_Capital"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
