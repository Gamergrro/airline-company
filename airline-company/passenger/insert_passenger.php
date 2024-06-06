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

// Retrieve form data
$surname = $_POST['surname'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$flight = $_POST['flights']; // Assuming the flight ID is passed from the form

// Insert data into database
$sql = "INSERT INTO Passenger (Surname, Name, Address, Phone, FlightID) VALUES ('$surname', '$name', '$address', '$phone', '$flight')";

if ($conn->query($sql) === TRUE) {
    echo "Passenger added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
