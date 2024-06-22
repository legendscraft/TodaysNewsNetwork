<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Todays News Network: Add Message</title>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="../css/styles.css">
  </head>
  <body>
    <header class="header-container">
      <img src="../images/tnn-logo.png" alt="TNN Logo" width="150" height="100">
      <h1>Todays News Network</h1>
    </header>
    <nav>
      <ul class="navbar">
        <li><a href = "http://www.strathmore.edu/">Strathmore University</a></li>
        <li><a href = "../html/index.html">Home</a></li>
        <li><a href = "../html/news.html">News</a></li>
        <li><a href = "../html/weather.html">Weather</a></li>
        <li><a href = "../html/contact-us.html">Contact Us</a></li>
      </ul>
    </nav>
    <section class="section">
      <h3>Today's News Network Contact Us</h3>
      <?php
        

          if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Validate email
            $email = $_POST['email'];
            if(empty($email)){
              echo '<h2 style="color: red;">Please provide an email!</h2>';
            }else{
              echo '<h2 style="color: green;">Your email is: </h2>'.$email;
            }

            // Validate Message
            $message = $_POST['message'];
            if(empty($message)){
              echo '<h2 style="color: red;">Please provide a message!</h2>';
            }else{
              echo '<h2 style="color: green;">Your message is: </h2>'.$message;
            }

            if(!empty($email) && !empty($message)){
              // Code reuse - call the connect to db script
              $conn = require 'connect_to_db.php';

              if($conn){
                echo '<h2 style="color: brown;">Saving your data...</h2>';

                // Prepare an SQL statement
                $stmt = $conn->prepare('INSERT INTO contact_us (email,message) VALUES (?,?)'); 

                if($stmt){
                  // Bind the parameters - check for types of the parameters
                  $stmt->bind_param('ss', $email, $message);

                  if($stmt->execute()){
                    echo '<h2 style="color: green;">Success</h2>';
                  }else{
                    echo '<h2 style="color: red;">Failed</h2>';
                  }
                  // Close the statement
                  $stmt->close();
                }
                // Close the connection
                $conn->close();
              }
            }
          }
      ?>
    </section>
    <footer class="footer-container">
      <p>&copy; 2024 TNN. All rights reserved</p>
    </footer>
  </body>
</html>