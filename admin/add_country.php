<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to login page
    header("Location: admin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Country</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
select,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: #007bff;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23171717" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 8px top 50%;
    background-size: 16px;
}

textarea {
    resize: vertical;
}

.form-group {
    margin-bottom: 30px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 12px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.invalid-feedback {
    color: #dc3545;
    margin-top: 5px;
}

@media (max-width: 768px) {
    .container {
        padding: 10px;
    }
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
        <h2>Add Country</h2>
        <form action="add_country_process.php" method="post">
            <div class="form-group">
                <label for="countryName">Country Name:*</label>
                <input type="text" id="countryName" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="capital">Capital:*</label>
                <input type="text" id="capital" name="capital" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="continent">Continent:*</label>
                <input type="text" id="continent" name="continent" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:*</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Country</button>
            <button onclick="goBack()" class="btn btn-primary">Back</button>
        </form>
    </div>
</body>
</html>
