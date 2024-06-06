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

// Query to retrieve passenger information
$sql = "SELECT * FROM Passenger";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["PassengerID"]. " - Name: " . $row["Name"]. " " . $row["Surname"]. "<br>";
        // You can output additional passenger information here as needed
    }
} else {
    echo "No passengers found";
}

$conn->close();
?>
