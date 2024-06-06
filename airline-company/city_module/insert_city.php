<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cityname = $conn->real_escape_string($_POST['cityname']);
    $flights = $_POST['flights'];

    $sql = "INSERT INTO city (cityname) VALUES ('$cityname')";

    if ($conn->query($sql) === TRUE) {
        $city_id = $conn->insert_id;
        foreach ($flights as $flight) {
            $conn->query("INSERT INTO city_flight (city_id, flight_id) VALUES ('$city_id', '$flight')");
        }
        echo "City added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
