<?php
session_start();

//Include database connection
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Check if user exists in the database
    $sql = "SELECT * FROM adminlog WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt)
    {
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $adminlog = $result->fetch_assoc(); 

        if ($adminlog && password_verify($password,$adminlog['password']))
        {
            //Store user info in session
            $_SESSION['userid'] = $adminlog['userid'];
            $_SESSION['username'] = $adminlog['username'];

            //Redirect user to a welcome page or dashboard
            header("location: dashboard.php");
            exit(); //Stop script execution after redirection
        }
        else
        {
            echo "Invalid email or password";
        }
    }
    else
    {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>





