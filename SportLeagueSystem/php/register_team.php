<?php
// Database connection
$servername = "localhost"; // Replace with your database server
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "sportsleague_system"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
    $coach_name = mysqli_real_escape_string($conn, $_POST['coach_name']);
    $coach_contact = mysqli_real_escape_string($conn, $_POST['coach_contact']);
    $captain_name = mysqli_real_escape_string($conn, $_POST['captain_name']);
    $captain_contact = mysqli_real_escape_string($conn, $_POST['captain_contact']);
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);
    $Address = mysqli_real_escape_string($conn, $_POST['Address']);

    // Insert data into the teams table
    $sql = "INSERT INTO teams (team_name, coach_name, coach_contact, captain_name, captain_contact, sport, Address)
            VALUES ('$team_name', '$coach_name', '$coach_contact', '$captain_name', '$captain_contact', '$sport', '$Address')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Team registered successfully!</p>";
        echo "<a href='feature.html'>Go back to the admin mode </a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
