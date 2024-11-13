<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Categories</title>
<nav class="navbar">
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="#about">Delete</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
</nav>
<style>
    .navbar {
        background-color: #333;
        padding: 10px 0;
    }

    .navbar ul {
        list-style-type: none;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navbar li {
        margin: 0 20px;
    }

    .navbar a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 10px 20px;
        display: block;
    }

    .navbar a:hover {
        background-color: #575757;
        border-radius: 4px;
    }

    table {
        margin-top: 20px;
        border-collapse: collapse;
        width: 80%;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }

    td form {
        display: inline;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #45a049;
    }

</style>
</head>

<body>

<center>
<?php
include 'db_connect.php';

$sql = "SELECT * FROM categories ORDER BY event_id DESC";  // Retrieve events, ordered by creation date
$result = $conn->query($sql);

echo "<h2>Event List</h2>";
echo "<table>
        <tr>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Status</th>
            <th>Sport Type</th>
            <th>Venue</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>";

if ($result) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['event_id']) . "</td>
                    <td>" . htmlspecialchars($row['event_name']) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                    <td>" . htmlspecialchars($row['sport_type']) . "</td>
                    <td>" . htmlspecialchars($row['venue']) . "</td>
                    <td>" . htmlspecialchars($row['description']) . "</td>
                    <td>" . htmlspecialchars($row['created_at']) . "</td>
                    <td>
                        <form action='edit_category.php' method='GET'>
                            <input type='hidden' name='event_id' value='" . htmlspecialchars($row['event_id']) . "'>
                            <button type='submit'>Edit</button>
                        </form>
                        <form action='delete_category.php' method='POST' onsubmit='return confirmDelete();'>
                            <input type='hidden' name='event_id' value='" . htmlspecialchars($row['event_id']) . "'>
                            <button type='submit'>Delete</button>
                        </form>
                    </td>
                 </tr>";
        }
        echo "</table>";
    } else {
        echo "<tr><td colspan='8'>No events found.</td></tr>";
    }
} else {
    echo "Error in SQL query: " . $conn->error;
}

$conn->close();
?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this event?");
    }
</script>

</center>
</body>
</html>
