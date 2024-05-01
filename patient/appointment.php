<?php
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["patientID"])) {
    // If not logged in, redirect to login page
    header("Location: patient.php");
    exit();
}
$patientID = $_SESSION["patientID"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for appointment booking form */
        body {
            font-family: Arial, sans-serif;
            background-color: #a3c2c2;
        }

        .container {
            background-color: #fff; /* White container background */   
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
            /* Add some space from the top */
        }

        h5 {
            color: #007bff; /* Blue header text */
        }

        .btn-primary {
            background-color: #007bff; /* Blue button background */
            border-color: #007bff; /* Blue button border */
            width: 100%; /* Full width button */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3;
        }

        /* Style selected slot ID display */
        #selectedSlotID {
            margin-top: 10px;
            font-weight: bold;
        }

        /* Custom styles for slot grid */
        .slot-grid {
            display: grid;
            margin-left:100px;
            margin-right:100px;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
        }

        .slot {
            background-color:lightgreen;
            color: black;
            padding: 25px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }

        .slot.selected {
            background-color: white;
        }

        .slot.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>


</head>
<body>
<div class="container">
    <h5 style="padding-top:10px;" class="text-center mt-5 mb-3">Book Appointment</h5>
    <form id="appointmentForm" action="appointment_process.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stateID">Select State:</label>
                    <select name="stateID" id="stateID" class="form-control" required>
                        <option value="">Select State</option>
                        <!-- Populate options dynamically using JavaScript or from a database -->
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cityID">Select City:</label>
                    <select name="cityID" id="cityID" class="form-control" required>
                        <option value="">Select City</option>
                        <!-- Populate options dynamically using JavaScript or from a database -->
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hospitalID">Select Hospital:</label>
                    <select name="hospitalID" id="hospitalID" class="form-control" required>
                        <option value="">Select Hospital</option>
                        <!-- Populate options dynamically using JavaScript or from a database -->
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="doctorID">Select Doctor:</label>
                    <select name="doctorID" id="doctorID" class="form-control" required>
                        <option value="">Select Doctor</option>
                        <!-- Populate options dynamically using JavaScript or from a database -->
                    </select>
                </div>
            </div>
            <div class="row ">
            <div class="col-lg-12">
                <labe style="font-weight:bold;padding:10px;" for="slotID">Select Slot Day & Time:</label>
                <div class="slot-grid" id="slotGrid">
                    <!-- Slot items will be populated dynamically using JavaScript -->
                </div>
                <input type="hidden" name="slotID" id="selectedSlot" value="">
                <div style="padding-left:25px;" id="selectedSlotID" class="mt-2"></div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="hidden" name="hospitalID" id="hospitalIDHidden" value="">
                    <input type="hidden" name="patientID" value="<?php echo $patientID; ?>">
                    <button type="submit" id="makeAppointmentBtn" class="btn btn-primary">Make Appointment</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- JavaScript -->
<script>
    // Fetch and populate states dropdown
    fetch("fetch_st.php")
        .then(response => response.json())
        .then(data => {
            console.log("States:", data); // Debugging
            const stateDropdown = document.getElementById("stateID");
            stateDropdown.innerHTML = "<option value=''>Select State</option>";
            data.forEach(state => {
                const option = document.createElement("option");
                option.value = state.stateID;
                option.textContent = state.name;
                stateDropdown.appendChild(option);
            });
        })
        .catch(error => console.error("Error fetching states:", error)); // Error handling

    // Event listener for state selection change
    document.getElementById("stateID").addEventListener("change", function() {
        const stateID = this.value;
        // Fetch and populate cities based on state selection
        fetch("fetch_cities.php?stateID=" + stateID)
            .then(response => response.json())
            .then(data => {
                console.log("Cities:", data); // Debugging
                const cityDropdown = document.getElementById("cityID");
                cityDropdown.innerHTML = "<option value=''>Select City</option>";
                data.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city.cityID;
                    option.textContent = city.city; // Change from city.name to city.city
                    cityDropdown.appendChild(option);
                });
            })
            .catch(error => console.error("Error fetching cities:", error)); // Error handling
    });

    document.getElementById("cityID").addEventListener("change", function() {
        const cityID = this.value;
        // Fetch and populate hospitals based on city selection
        fetch("fetch_hospitals.php?cityID=" + cityID)
            .then(response => response.json())
            .then(data => {
                console.log("Hospitals:", data); 
                const hospitalDropdown = document.getElementById("hospitalID");
                hospitalDropdown.innerHTML = "<option value=''>Select Hospital</option>";
                data.forEach(hospital => {
                    const option = document.createElement("option");
                    option.value = hospital.hospitalID;
                    option.textContent = hospital.name;
                    hospitalDropdown.appendChild(option);
                });
            })
            .catch(error => console.error("Error fetching hospitals:", error));
    });

    document.getElementById("hospitalID").addEventListener("change", function() {
        const hospitalID = this.value;
        document.getElementById("hospitalIDHidden").value = hospitalID;
        // Fetch and populate doctors based on hospital selection
        fetch("fetch_doctors.php?hospitalID=" + hospitalID)
            .then(response => response.json())
            .then(data => {
                console.log("Doctors:", data);
                const doctorDropdown = document.getElementById("doctorID");
                doctorDropdown.innerHTML = "<option value=''>Select Doctor</option>";
                data.forEach(doctor => {
                    const option = document.createElement("option");
                    option.value = doctor.doctorID;
                    option.textContent = `${doctor.name} -  ${doctor.specialization}`;
                    doctorDropdown.appendChild(option);
                });
            });
    });

    function populateSlotGrid(slots) {
        const slotGrid = document.getElementById("slotGrid");
        slotGrid.innerHTML = ""; // Clear previous slots

        slots.forEach(slot => {
            const slotElement = document.createElement("div");
            slotElement.classList.add("slot");
            slotElement.textContent = slot.slotDate + " " + slot.startTime + " - " + slot.endTime;
            slotElement.dataset.slotId = slot.slotID;
            slotElement.addEventListener("click", () => {
                const selectedSlot = document.getElementById("selectedSlot");
                selectedSlot.value = slot.slotID;
                document.getElementById("selectedSlotID").textContent = "ID: " + slot.slotID;

                // Remove "selected" class from all slots
                const allSlots = document.querySelectorAll(".slot");
                allSlots.forEach(slot => {
                    slot.classList.remove("selected");
                });

                // Add "selected" class to the clicked slot
                slotElement.classList.add("selected");
            });

            slotGrid.appendChild(slotElement);
        });
    }

    // Fetch and populate doctor slots based on doctor selection
    document.getElementById("doctorID").addEventListener("change", function() {
        const doctorID = this.value;
        fetch("fetch_appointment.php?doctorID=" + doctorID)
            .then(response => response.json())
            .then(data => {
                populateSlotGrid(data);
            })
            .catch(error => console.error("Error fetching doctor slots:", error));
    });
</script>

</body>
</html>
