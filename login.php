<?php
session_start();

// Database connection settings
$host = 'localhost';
$login = 'root'; // changed from $user to $login to match mysqli connection
$pass = '';
$db = 'mypetakom_portal';
$port = 3306;

// Connect to the database
$conn = new mysqli($host, $login, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['position']);

    $stmt = $conn->prepare("SELECT * FROM login WHERE Email = ? AND Role = ?");
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (trim($row['Password']) === $password) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['userID'] = $row['userID']; // Keep this unless you renamed userID

            // ✅ Set cookies (expires in 7 days)
            $cookie_expiration = time() + (7 * 24 * 60 * 60); // 7 days
            setcookie("email", $email, $cookie_expiration, "/");
            setcookie("role", $role, $cookie_expiration, "/");
            setcookie("userID", $row['userID'], $cookie_expiration, "/");

            // Redirect based on role
            if ($role === "Student") {
                header("Location: dashboardstudent.html");
            } elseif ($role === "Event Advisor") {
                header("Location: dashboardeventadvisor.html");
            } elseif ($role === "Admin") {
                header("Location: dashboardadmin.html");
            }
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href = 'login.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyPETAKOM Login</title>
    <link rel="stylesheet" href="style/logindashboard.css"/>
</head>
<body>
    <div class="container">
        <h1 class="title">MyPETAKOM</h1>
        <div class="logo"></div>
    </div>

    <div class="form-wrapper">
        <div class="form-box">
            <form method="POST" action="">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="position">Position</label>
                <select id="position" name="position" required>
                    <option value="" disabled selected>Select your position</option>
                    <option value="Student">Student</option>
                    <option value="Event Advisor">Event Advisor</option>
                    <option value="Admin">Admin</option>
                </select>

                <div class="button-container">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

