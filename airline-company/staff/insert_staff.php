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
$name = $_POST['name'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$salary = $_POST['salary'];

// Insert data into database
$sql = "INSERT INTO Staff (Name, Surname, Address, Phone, Salary) VALUES ('$name', '$surname', '$address', '$phone', '$salary')";

if ($conn->query($sql) === TRUE) {
    echo "Staff added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
