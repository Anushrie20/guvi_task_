<?php
// Database connection parameters
$servername = "localhost";
$username = "anushrie";
$password = "Arun@1100";
$dbname = "login";

// Establish a connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    $response = array("success" => false, "message" => "Database connection failed: " . $conn->connect_error);
    echo json_encode($response);
    die();
}

// Establish a connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    $response = array("success" => false, "message" => "Database connection failed: " . $conn->connect_error);
    echo json_encode($response);
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password); 
    if ($stmt->execute()) {
        $response = array("success" => true, "message" => "Registration successful");
        echo json_encode($response);
    } else {
        $response = array("success" => false, "message" => "Registration failed. Please try again.");
        echo json_encode($response);
    }
    
   
    $stmt->close();
} else {

    $response = array("success" => false, "message" => "Invalid request method.");
    echo json_encode($response);
}
