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

// Query to retrieve flight information
$sql = "SELECT * FROM Flight";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Flight Number: " . $row["FlightNum"]. " - Origin: " . $row["Origin"]. " - Destination: " . $row["Destination"]. " - Date: " . $row["FlightDate"]. "<br>";
        // You can output additional flight information here as needed
    }
} else {
    echo "No flights found";
}

$conn->close();
?>
