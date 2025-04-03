<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection parameters
    $host = 'localhost'; // Database host
    $db = 'dbmsproject'; // Database name
    $user = 'your_db_username'; // Database username
    $pass = 'your_db_password'; // Database password

    // Create a connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists, verify password
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            // Login successful
            $_SESSION['username'] = $username; // Store username in session
            header("Location: welcome.php"); // Redirect to a welcome page
            exit();
        } else {
            // Login failed
            header("Location: login.html?error=Invalid username or password.");
            exit();
        }
    } else {
        // User does not exist
        header("Location: login.html?error=Invalid username or password.");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
