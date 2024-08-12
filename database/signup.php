<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["firstname"]; // Assuming "firstname" is for username
    $password = $_POST["password"];

    // Database connection
    $servername = "localhost";
    $username_db = "root"; // Replace with your database username
    $password_db = ""; // Replace with your database password
    $dbname = "userlogin"; // Replace with your database name
    $tablename = "logininfo"; // Replace with your table name

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the table
    $sql = "INSERT INTO $tablename (username, password)
            VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";

        // Output JavaScript code for redirection after 1 second
        echo '<script>
                  setTimeout(function(){
                      window.location.href = "http://localhost/SE-project/ritu/login.php";
                  }, 1000); // 1000 milliseconds = 1 second
              </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
