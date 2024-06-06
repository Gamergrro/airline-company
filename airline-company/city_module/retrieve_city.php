<?php
// Database connection details
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

// Query to retrieve city information
$sql = "SELECT * FROM city";  // Table name should be in lower case if it was created that way
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "City Name: " . htmlspecialchars($row["cityname"]) . "<br>";
        // Output additional city information if needed
    }
} else {
    echo "No cities found";
}

$conn->close();
?>
