<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
print($username);
    // Database connection
    $servername = "localhost"; // assuming your database is on the same server
    $username_db = "root"; // your database username
    $password_db = ""; // your database password
    $dbname = "userlogin"; // your database name

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check user credentials
    $sql = "SELECT * FROM logininfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        echo '<script>window.location.href = "http://localhost/SE%20project/manas/";</script>';
    } else {
        // Login failed
        echo '<script>
                   setTimeout(function() {
                       document.getElementById("login-error").innerHTML = "Invalid username or password.";
                   }, 3000);
                </script>';
                
    }

    $conn->close();
}
?>
