<?php
include 'db_connect.php';

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Fetch the event from the database using the ID
    $sql = "SELECT * FROM categories WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
    } else {
        echo "Event not found!";
        exit();
    }

    $stmt->close();
} else {
    echo "Invalid event ID!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Category</title>
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
    <h2>Edit Category</h2>
    <form action="update_category.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $category['event_id']; ?>">

        <label for="event_name">Event Name</label>
        <input type="text" id="event_name" name="event_name" value="<?php echo $category['event_name']; ?>" required>

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="active" <?php echo $category['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo $category['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select>

        <label for="sport_type">Sport Type</label>
        <select id="sport_type" name="sport_type">
            <option value="Basketball" <?php echo $category['sport_type'] == 'Basketball' ? 'selected' : ''; ?>>Basketball</option>
            <option value="Volleyball" <?php echo $category['sport_type'] == 'Volleyball' ? 'selected' : ''; ?>>Volleyball</option>
            <option value="Badminton" <?php echo $category['sport_type'] == 'Badminton' ? 'selected' : ''; ?>>Badminton</option>
            <option value="Tennis" <?php echo $category['sport_type'] == 'Tennis' ? 'selected' : ''; ?>>Tennis</option>
        </select>

        <label for="venue">Venue</label>
        <input type="text" id="venue" name="venue" value="<?php echo $category['venue']; ?>" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" required><?php echo $category['description']; ?></textarea>

        <button type="submit">Update Category</button>
    </form>
</div>

</body>
</html>
