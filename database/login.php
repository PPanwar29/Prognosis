<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="login.css" />
  <style>
    #loading-animation {
      display: none;
      position: fixed;
      z-index: 2;
      top: 0;
      flex-direction: column;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      font-size: 24px;
    justify-content: center;
    align-items: center;
      text-align: center;
      padding-top: 20%;
    }
    .loding {
      border: 5px solid black;
      border-radius: 50%;
      width: 100px;
      border-top: 5px solid yellow;
      height: 100px;
      background-color: pink;
      animation: spin 2s linear infinite; /* Animation for rotation */
    }
    @keyframes spin {
      0% {
        transform: rotate(0deg); /* Start from 0 degrees rotation */
      }
      100% {
        transform: rotate(360deg); /* End at 360 degrees rotation (full circle) */
      }
    }
  </style>
</head>

<body>
  <div id="circle-wrap1">
    <div id="bubble1"></div>
  </div>
  <div id="circle-wrap2">
    <div id="bubble2"></div>
  </div>

  <div id="login-wrapper">
    <div id="login-container">
      <div id="helloUser">
        <p>Hello User, Welcome Back</p>
      </div>
      <div id="loginForm">
        <div id="login-form">
          <div id="login-contain">
            <div id="details">
              <div id="welcome" class="margin-details-box">
                <p>Login to your account</p>
              </div>
              <form method="post">
                <div id="gmail" class="margin-details-box">
                  <input type="text" name="username" placeholder="Phone Number Username or Gmail" required />
                </div>
                <div id="pass" class="margin-details-box">
                  <input type="password" name="password" placeholder="Password" required />
                </div>
                <div id="loginBtn" class="margin-details-box">
                  <button id="login-button" type="submit" name="submit">Login</button>
                </div>
              </form>
            </div>
            <div id="or">
              <p id="or">OR</p>
            </div>
            <div id="someError" class="margin-details-box">
              <p>Login in through</p>
              <div id="throughSocial" class="margin" class="margin-details-box">
                <a href="https://www.facebook.com/login/">
                  <i class="fa-brands fa-facebook" style="color: #557ec3"></i>
                </a>
                <a href="#">
                  <i class="fa-brands fa-google" style="color: #557ec3"></i>
                </a>
                <a href="#">
                  <i class="fa-brands fa-x-twitter" style="color: #557ec3"></i>
                </a>
              </div>
              <div id="forgetPass" class="margin">
                <a href="#">Forgot password</a>
              </div>
              <div id="dontaccount" class="margin">
                <p>
                  Don't have an account? <a href="./signup.html" style="color: black">Register here</a>
                </p>
              </div>
              <p></p>
              <div id="getAp">
                <div id="plastore"></div>
                <div id="apptore"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="pic">
          <div id="imgcontain"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="loading-animation">
    <div class="loding" ></div>
    Please wait, your data is being checked...
  </div>


  <?php
  // Check if the form is submitted
  if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection
    $servername = "localhost";
    $username_db = "root"; // Replace with your database username
    $password_db = ""; // Replace with your database password
    $dbname = "userlogin"; // Replace with your database name

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check user credentials
    $sql = "SELECT * FROM logininfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Redirect with JavaScript after showing loading animation
      echo '<script>
                document.getElementById("loading-animation").style.display = "flex";
                setTimeout(function(){
                    window.location.href = "http://localhost/SE-project/manas/";
                }, 2000); // 2000 milliseconds = 2 seconds
            </script>';
  } else {
    echo '<script>
    document.getElementById("loading-animation").style.display = "flex";
    setTimeout(function(){
        alert("Invalid username or password.");
        document.getElementById("loading-animation").style.display = "none";
    }, 2000); // 2000 milliseconds = 2 seconds
  </script>';
  }

  $conn->close();
  }
  ?>

</body>

</html>
