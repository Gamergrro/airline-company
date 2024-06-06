<?php
// Database connection
$servername = "localhost";
$username = "Vict.gh";
$password = "victorgh20";
$dbname = "airline_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve staff information
$sql = "SELECT * FROM Staff";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Staff ID: " . $row["StaffID"]. " - Name: " . $row["Name"]. " " . $row["Surname"]. " - Address: " . $row["Address"]. " - Phone: " . $row["Phone"]. " - Salary: " . $row["Salary"]. "<br>";
        // You can output additional staff information here as needed
    }
} else {
    echo "No staff found";
}

$conn->close();
?>
