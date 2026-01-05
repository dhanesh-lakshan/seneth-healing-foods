

<?php 
    //Start Session
       
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'senemszr_root');
    define('DB_PASSWORD', 'Nddddd@16721??');
    define('DB_NAME', 'senemszr_food_delivery');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); 


?>

