<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Countries</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      max-width: 800px;
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
<!-- #region -->
<script>
    function goBack() {
      window.history.back();
    }
  </script>


</head>
<body>

<div class="container">
<button onclick="goBack()" class="btn btn-primary mb-3">Back</button>
  <h4 class="mt-5 mb-3">Countries</h4>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Capital</th>
        <th scope="col">Continent</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Including database configuration file
      include("../db/configdb.php");

      $sql = "SELECT * FROM country";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<th scope='row'>" . $row["countryID"] . "</th>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["capital"] . "</td>";
          echo "<td>" . $row["continent"] . "</td>";
          echo "<td>" . $row["description"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No countries found</td></tr>";
      }

      // Closing connection
      $conn->close();
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
