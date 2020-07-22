<?php

/**
 *    
 * create.php
 *    
 * Saves information in the table 'info'
 * 
 * @author     Leiner Ceballos
 * @version    1.0
 * @category   Back-end
 */

include("../config/database.php");

// Action click button
if(isset($_POST['save_info']))
{
    $fullname = $_POST['fullname'];
    $description = $_POST['description'];
    
    /* check connection */
    if ($connection-> connect_errno) {
      echo "Failed to connect to MySQL: " . $connection-> connect_error;
      exit();
    } 

    $query = "INSERT INTO `info`(name, description) VALUES ('$fullname', '$description')";
    $results = $connection->query($query);
    $connection->close(); // close connection

    //session message
    $_SESSION['message_alert'] = 'Saved successfully';
    $_SESSION['color_alert'] = 'success';


    //Redirect to index
    $host  = $_SERVER['HTTP_HOST'];
    $index = 'index.php';
    header("Location: http://$host/$extra");
}

