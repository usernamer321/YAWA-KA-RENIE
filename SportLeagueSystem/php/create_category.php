<?php
session_start();
include 'db_connect.php';  
$conn->set_charset("utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    $event_name = isset($_POST['event_name']) ? $_POST['event_name'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : 'active';
    $venue = isset($_POST['venue']) ? $_POST['venue'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $sport_type = isset($_POST['sport_type']) ? $_POST['sport_type'] : '';  // Added sport type field

    // Fetch the latest event_id from the database (if you're not using AUTO_INCREMENT)
    $sql = "SELECT MAX(event_id) AS max_event_id FROM categories";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $event_id = $row['max_event_id'] + 1; // Increment the latest event_id by 1

    // Prepare the SQL query to insert the new category
    $sql = "INSERT INTO categories (event_id, event_name, status, venue, description, sport_type) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("isssss", $event_id, $event_name, $status, $venue, $description, $sport_type);

        // Execute the query
        if ($stmt->execute()) {
            // If the insertion is successful, redirect to the category list
            header("Location: category_list.php");
            exit();
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #5cb85c;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4cae4c;
        }

        /* Responsive Design for smaller screens */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Create Category</h2>
    <form action="create_category.php" method="POST">
        <label for="event_name">Event Name</label>
        <input type="text" id="event_name" name="event_name" required>

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <label for="sport_type">Sport Type</label>
        <select id="sport_type" name="sport_type" required>
            <option value="basketball">Basketball</option>
            <option value="volleyball">Volleyball</option>
            <option value="badminton">Badminton</option>
            <option value="tennis">Tennis</option>
        </select>

        <label for="venue">Venue</label>
        <input type="text" id="venue" name="venue" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit">Create Category</button>
    </form>
</div>

</body>
</html>
