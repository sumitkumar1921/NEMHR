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
    <title>Search Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style for the search form */
#searchForm {
    max-width: 400px;
    margin: 0 auto;
}

/* Style for the search results container */
#searchResults {
    margin-top: 20px;
}

/* Style for the search results table */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

.table th {
    background-color: #f8f9fa;
    font-weight: bold;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #e2e6ea;
}

    </style>
</head>
<body>

<div class="container mt-5">
    <h4 class="text-center">Search Patients</h4>
    <form id="searchForm">
        <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="aadharNumber" class="form-label">Aadhar Number</label>
            <input type="text" class="form-control" id="aadharNumber" name="aadharNumber" placeholder="Enter Aadhar number">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div id="searchResults" class="mt-5">
        <!-- Search results will be displayed here -->
    </div>
</div>

<script>
document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Fetch search parameters
    const name = document.getElementById('name').value;
    const dob = document.getElementById('dob').value;
    const aadharNumber = document.getElementById('aadharNumber').value;

    // Prepare search data
    const searchData = new URLSearchParams();
    searchData.append('name', name);
    searchData.append('dob', dob);
    searchData.append('aadharNumber', aadharNumber);

    // Fetch API call to search.php
    fetch('search.php', {
        method: 'POST',
        body: searchData
    })
    .then(response => response.json())
    .then(data => {
        // Display search results
        const searchResultsContainer = document.getElementById('searchResults');
        searchResultsContainer.innerHTML = '';

        if (data.length > 0) {
            const table = document.createElement('table');
            table.className = 'table table-striped';
            const thead = document.createElement('thead');
            const tbody = document.createElement('tbody');

            // Create table header
            const headerRow = document.createElement('tr');
            ['Patient ID','FirstName','LastName' ,'Gender','BloodGroup', 'Email', 'Contact'].forEach(text => {
                const th = document.createElement('th');
                th.textContent = text;
                headerRow.appendChild(th);
            });
            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Populate table with search results
            data.forEach(patient => {
                const row = document.createElement('tr');
                ['patientID','firstName','lastName','gender','bloodGroup', 'email', 'contact'].forEach(key => {
                    const cell = document.createElement('td');
                    cell.textContent = patient[key];
                    row.appendChild(cell);
                });
                tbody.appendChild(row);
            });
            table.appendChild(tbody);

            searchResultsContainer.appendChild(table);
        } else {
            searchResultsContainer.innerHTML = '<p>No results found.</p>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>

</body>
</html>
