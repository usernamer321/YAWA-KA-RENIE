<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event_id'])) {
    $event_id = intval($_POST['event_id']);

    // Prepare and execute the delete statement
    $sql = "DELETE FROM categories WHERE event_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $event_id);

        if ($stmt->execute()) {
            echo "Event deleted successfully!";
        } else {
            echo "Error deleting event: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();

// Redirect back to the event list after deletion
header("Location: category_list.php");
exit();
?>
