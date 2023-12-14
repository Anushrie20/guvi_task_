<?php
$servername = "localhost";
$username = "anushrie";
$password = "Arun@1100";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    $response = array("success" => false, "message" => "Database connection failed: " . $conn->connect_error);
    echo json_encode($response);
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        
        $row = $result->fetch_assoc();
        if ($password == $row['password']) { 
            $response = array("success" => true, "message" => "Login successful");
            echo json_encode($response);
        } else {
            // Password does not match
            $response = array("success" => false, "message" => "Invalid username or password.");
            echo json_encode($response);
        }
    } else {
        // User not found
        $response = array("success" => false, "message" => "Invalid username or password.");
        echo json_encode($response);
    }
    

    $stmt->close();
} else {
    
    $response = array("success" => false, "message" => "Invalid request method.");
    echo json_encode($response);
}


$conn->close();
?>