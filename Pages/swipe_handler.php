<?php
// Check if the request is AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['action'])) {
        $action = $data['action'];
        // Perform your server-side logic here
        echo json_encode(['message' => "Received: $action"]);
    } else {
        echo json_encode(['message' => 'No action received']);
    }
}
