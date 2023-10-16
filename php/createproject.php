<?php
// Adding CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");


require_once "inc/dbconn.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if the required fields are present in the JSON data
    if (isset($data["projectName"], $data["projectKey"], $data["projectType"], $data["projectLead"], $data["defaultAssignee"])) {
        // Extract data from the JSON
        $projectName = $data["projectName"];
        $projectKey = $data["projectKey"];
        $url = isset($data["url"]) ? $data["url"] : null; // Optional field, use isset to check
        $projectType = $data["projectType"];
        $description = isset($data["description"]) ? $data["description"] : null; // Optional field, use isset to check
        $projectLead = $data["projectLead"];
        $defaultAssignee = $data["defaultAssignee"];
        $startDate = $data["startDate"];

        // Debugging: Print the received data to the error log (check your server's error log)
       // error_log("Received data:\n" . print_r($data, true));

        $sql = "INSERT INTO projects (projectName, `key`, url, projectType, description, projectLead, defaultAssignee, startDate)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($statement, $sql)) {
            mysqli_stmt_bind_param($statement, 'ssssssss', $projectName, $projectKey, $url, $projectType, $description, $projectLead, $defaultAssignee, $startDate);

            if (mysqli_stmt_execute($statement)) {
                
                echo "Project created successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error preparing statement: " . mysqli_stmt_error($statement);
        }
        mysqli_close($conn);
    }
}
