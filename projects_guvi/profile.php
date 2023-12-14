<?php

$mongoClient = new MongoDB\Client("mongodb://your_mongo_host:your_mongo_port");

eck
if (!isAuthenticated()) {
    $response = array("error" => "User not authenticated");
    echo json_encode($response);
    exit();
}

$userID = 123; 
$collection = $mongoClient->your_database_name->users; 
$userProfile = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($userID)]);

if ($userProfile) {
   
    $response = array(
        "username" => $userProfile['username'],
        "age" => $userProfile['age'],
        "dob" => $userProfile['dob'],
        "contact" => $userProfile['contact'],
      
    );
    echo json_encode($response);
} else {
   
    $response = array("error" => "User profile not found");
    echo json_encode($response);
}

function isAuthenticated() {
    
    return true;
}
?>

