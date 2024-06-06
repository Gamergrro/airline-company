<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Query to retrieve airplane information
$sql = "SELECT a.SerialNumber, a.Manufacturer, a.Model, GROUP_CONCAT(f.FlightNumber) as Flights
        FROM Airplane a
        LEFT JOIN Flight_Airplane fa ON a.SerialNumber = fa.SerialNumber
        LEFT JOIN Flight f ON fa.FlightNumber = f.FlightNumber
        GROUP BY a.SerialNumber";

// Check the constructed SQL query
echo $sql;

$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>Serial Number:</strong> " . htmlspecialchars($row["SerialNumber"]) . "<br>";
        echo "<strong>Manufacturer:</strong> " . htmlspecialchars($row["Manufacturer"]) . "<br>";
        echo "<strong>Model:</strong> " . htmlspecialchars($row["Model"]) . "<br>";
        echo "<strong>Assigned Flights:</strong> " . htmlspecialchars($row["Flights"]) . "</p>";
    }
} else {
    echo "No airplanes found";
}

$conn->close();
?>
