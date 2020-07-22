<?php

/**
 *    
 * database.php
 *    
 * Returns the connection to the database 
 * 
 * @author     Leiner Ceballos
 * @version    1.0
 * @category   Database    
 */

session_start();

$host = 'localhost';
$user = 'leiner';
$password = '31leiner';
$db_name = 'db_users';

$connection = new mysqli($host, $user, $password, $db_name);

?>