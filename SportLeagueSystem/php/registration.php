<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare the SQL query to insert the new user without checking for email
    $sql = "INSERT INTO adminlog (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ss", $username, $password);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href='../loginad.html';</script>";
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
    <link rel="stylesheet" href="css/style.css">
    <title>Register Your Account</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image:  url('reg.jpg');
            background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #666;
            text-align: left;
        }
        input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border 0.3s;
        }
        input:focus {
            border: 1px solid #fda085;
            outline: none;
        }
        button {
            background-color: blue;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s;
        }
        button:hover {
            background-color: green;
        }
        p {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #555;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Create Your Account</h2>
    <form action="registration.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>

        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="../loginad.html">Login here</a></p>
</div>

</body>
</html>
  
   