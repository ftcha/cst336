<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title> OtterMart - Admin Site </title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <h1> OtterMart - Admin Site</h1>
        
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
            
            <input type="submit" name="submitForm" value="Login!" />
            
            <?php
                if ($_SESSION['incorrect']) {
                    echo "<p class='lead' id='error' style='color:red'>";
                    echo "<strong> Incorrect Username or Password!</strong>";
                }
            
            
            ?>
            
        </form>
    
    </body>
</html>