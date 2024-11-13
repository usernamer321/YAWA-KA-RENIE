<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $event_id = $_POST['id'];  // Changed from 'category_id' to 'event_id'
    $event_name = $_POST['event_name'];  // Changed from 'category_name' to 'event_name'
    $status = $_POST['status'];
    $sport_type = $_POST['sport_type'];  // Include sport_type
    $venue = $_POST['venue'];  // Include venue
    $description = $_POST['description'];

    // Prepare the SQL query to update the category
    $sql = "UPDATE categories SET event_name = ?, status = ?, sport_type = ?, venue = ?, description = ? WHERE event_id = ?"; // Use event_id instead of category_id
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("sssssi", $event_name, $status, $sport_type, $venue, $description, $event_id); // Include the sport_type and venue

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Category updated successfully!'); window.location.href='category_list.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
