<?php

session_start();
$sessmail = $_SESSION['usmal'];
$sesfulln = $_SESSION['fulln'];


$servername="localhost";
  $username="root";
  $password="";
  $dbname= "myschool";


// establishing connection with the server by passing servername, username, password and database name as the peremeters
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_POST['updater'])){
  $candid12 = trim(strip_tags($_POST['candid12']));
  $fonn = trim(strip_tags($_POST['fonn']));
  $fullnn = trim(strip_tags($_POST['fullnn']));
  $progn = trim(strip_tags($_POST['progn']));
  $coursen= trim(strip_tags($_POST['coursen'])); 

   //$dopwd='kokoro'.$pwd;

   echo $fonn.''.$fullnn.''.$progn.''.$coursen.''.$emaln.''.$candid12;


  if($fonn == "" || $fullnn == "" || $progn == "" || $coursen == "") {
  $mes="<script type ='text/javascript'>alert('please do not submit empty form.')</script>";
      $ms="do not submit an empty form 
      ";

 }
 
/*else if(!filter_var($emaln,FILTER_VALIDATE_EMAIL)){
        $mes ='<script type="text/javascript">
        alert("The email provided is invalid, please retry.");
        </script>';
          $ms = "The email provided is invalid, please retry. ";
        }*/

    
else if ((strlen($fonn) < 11) || (!(is_numeric ($fonn))) ){
       $mes='<script type="text/javascript">
        alert("The phone number invalid, please retry.");
        </script>';

         $ms = "The phone number invalid, please retry.";
       }

        
else{
$queryy = mysqli_query($conn, "UPDATE  applicants SET fulln='$fullnn', fon='$fonn',course='$coursen',prog='$progn' WHERE id =$candid12");

 echo '<script type="text/javascript">
        alert("Details successfully edited and saved.");
        </script>';
         echo "Details successfully edited and saved.  <a href='applicant.php'> click here for applicant list </a>";

        // header("Location: adminhome.php");

       }



       
   
   }
   

?>