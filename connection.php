<?php
 session_start();


        $server = "localhost";
        $user =     "root";
        $password = "";
        $dbname = "myschool";

                
//connection the connection
$conn = new mysqli($server, $user, $password);


if ($conn->connect_error) {
  die("connection failed: " .$conn->connect_error);
} 
 