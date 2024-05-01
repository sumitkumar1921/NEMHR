<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Country Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      max-width: 80%;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h4 {
      text-align: center;
      color:blue;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #f5f5f5;
    }
  </style>

<script>
    function goBack() {
      window.history.back();
    }
  </script>

</head>
<body>

<div class="container">
<button onclick="goBack()" class="btn btn-primary mb-3">Back</button>
  <h4>State Information</h4>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Country</th>
        <th>State</th>
        <th>Capital</th>
        <th>Zone</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <!-- Loop through states data and generate rows -->
      <?php
        // Connect to your database
        include("../db/configdb.php");

        // Fetch states data from the database
        $sql = "SELECT state.*, country.name AS country_name FROM state
        INNER JOIN country ON state.countryID = country.countryID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["stateID"] . "</td>";
    echo "<td>" . $row["country_name"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["capital"] . "</td>";
    echo "<td>" . $row["zone"] . "</td>";
    echo "<td>" . $row["description"] . "</td>";
    echo "</tr>";
  }
        } else {
          echo "0 results";
        }
        $conn->close();
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
