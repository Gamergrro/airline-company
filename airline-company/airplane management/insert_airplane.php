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

// Check if form data is received
var_dump($_POST);

// Check if form data is received correctly
if (isset($_POST['sernum']) && isset($_POST['manufacturer']) && isset($_POST['model']) && isset($_POST['flights'])) {
    // Process form data and insert into database
    $sernum = $_POST['sernum'];
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $flights = $_POST['flights'];

    // Insert data into database (replace this with your actual insert query)
    $sql = "INSERT INTO Airplane (SerialNumber, Manufacturer, Model) VALUES ('$sernum', '$manufacturer', '$model')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "Form data not received correctly";
}

$conn->close();
?>
