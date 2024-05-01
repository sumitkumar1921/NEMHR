<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Search</title>
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
    <h4 class="text-center">Insurance Search</h4>
    <form id="searchForm">
        <div class="mb-3">
            <label for="patientID" class="form-label">Patient ID</label>
            <input type="text" class="form-control" id="patientID" name="patientID" placeholder="Enter Patient ID">
        </div>
        <span>OR</span>
        <div class="mb-3" id="providerSelect">
            <label for="provider" class="form-label">Select Provider</label>
            <select class="form-select" id="provider" name="provider">
                <option value="">Select Company</option>
                <?php
                // Include database connection
                include_once "../db/configdb.php";

                // Fetch provider names from the insurance table
                $query = "SELECT DISTINCT provider FROM insurance";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['provider'] . "'>" . $row['provider'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3" id="policyNumberInput">
            <label for="policyNumber" class="form-label">Policy Number</label>
            <input type="text" class="form-control" id="policyNumber" name="policyNumber" placeholder="Enter Policy Number">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div id="searchResults"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Get search input and type
    const patientID = document.getElementById('patientID').value;
    const provider = document.getElementById('provider').value;
    const policyNumber = document.getElementById('policyNumber').value; // Get policy number

    const searchData = new URLSearchParams();
    searchData.append('patientID', patientID); // Corrected variable name to match PHP
    searchData.append('provider', provider);
    searchData.append('policyNumber', policyNumber);
    // Fetch data from server
    fetch('insurance_search.php', {
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
            ['Patient ID', 'Policy Type', 'Policy Number', 'Company', 'Valid From', 'Valid To'].forEach(text => {
                const th = document.createElement('th');
                th.textContent = text;
                headerRow.appendChild(th);
            });
            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Populate table with search results
            data.forEach(patient => {
                const row = document.createElement('tr');
                ['patientID', 'policyType', 'policyNumber', 'provider', 'validFrom', 'validTo'].forEach(key => { // Corrected key names to match PHP
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
