<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Doctor</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2 class="mb-4">View Hospitals</h2>
    <form action="add_hospital_process.php" method="post">
      <div class="row">
        <!-- Country Dropdown -->
        <div class="col-md-4">
        <div class="form-group">
            <label for="countryID">Select Country:</label>
            <select name="countryID" id="countryID" class="form-control">
            <option value="">Select Country</option>
                <!-- Options will be populated via JavaScript -->
            </select>
        </div>
        </div>
        <!-- State Dropdown -->
        <div class="col-md-4">
        <div class="form-group">
            <label for="stateID">Select State:</label>
            <select name="stateID" id="stateID" class="form-control">
            <option value="">Select State</option>
                <!-- Options will be populated via JavaScript -->
            </select>
        </div>
        <!-- City Dropdown -->
        <div class="col-md-4">
        <div class="form-group">
            <label for="cityID">Select City:</label>
            <select name="cityID" id="cityID" class="form-control">
            <option value="">Select City</option>
                <!-- Options will be populated via JavaScript -->
            </select>
        </div>
        
      </div>
  <div class="row">
        <!-- First Column -->
  <div class="col-md-6">
        <div class="form-group">
                 <label for="license">License Number:</label>
                 <input type="text" id="license" name="license" class="form-control" required>
            </div>
    <div class="form-group">
        <label for="type">Hospital Type:</label>
        <select name="type" id="type" class="form-control">
           <option value="">Select Type</option>
            <option value="private">Private</option>
            <option value="public">Public</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Hospital Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact" class="form-control" pattern="[0-9]{10}" required>
        <div class="invalid-feedback">Please enter a valid 10-digit contact number.</div>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
  </div>
        
        <div class="col-md-6">
        <div class="form-group">
        <label for="website">Website:</label>
        <input type="text" id="website" name="website" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Hospital</button>
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
