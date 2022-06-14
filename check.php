<?php 
session_start();


 $sessmail = $_SESSION['usmal'] = $usmal;
 $sefulln = $_SESSION['fulln']=$fulln;


$servername="localhost";
  $username="root";
  $password="temitope";
  $dbname="myschool";

// establishing connection with the server by passing servername, user_id, password and database name as the peremeters
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}


if (isset($_POST['submit'])){
   //mysqli_real_escape_string($con,$_POST["pass1"]);
   $candidate = mysqli_real_escape_string($conn, $_POST['candidate']);


 $Kingpaul = mysqli_query($conn, "SELECT * FROM app WHERE id=$candidate");
 while ($row=mysqli_fetch_assoc($Kingpaul)) {
      $session2 = $row['session'];
      $closingdate2 =$row['closingdate'];
      $applicationfee2= $row['applicationfee'];
      $currentsession2 = $row['Currentsession'];
     }


   if (isset($_POST['update'])){
   
      $session = mysqli_real_escape_string($conn, $_POST['session3']);
      $cdate = mysqli_real_escape_string($conn, $_POST['cdate']);
      $Appfee = mysqli_real_escape_string($conn, $_POST['Appfee']);
      $currentsession=mysqli_real_escape_string($conn, $_POST['csession']);

      echo $session.''.$cdate.''.$Appfee.''.$currentsession;

   
   if($session == "" || $cdate == "" || $Appfee == ""||$currentsession=="") {
  $mes="<script type ='text/javascript'>alert('please do not submit empty form.')</script>";
      $ms="do not submit an empty form 
      ";

 }
      

 else if ((strlen($session) > 12) || (!(is_numeric ($session))) ){
          $mes='<script type="text/javascript">
        alert("The session is incorrect, please retry.");
        </script>';

         $ms = "The session is invalid, please retry. ";} 
        
                              

   else if((strlen($Appfee) >20) || (!(is_numeric ($Appfee)))){
            $mes='<script type="text/javascript">
        alert(" The specified amount incorrect.");
        </script>';
          $ms = "The specified amount incorrect.";} 
  
      else{      
     $kolo = "UPDATE app SET session='$session',closingdate='$cdate',applicationfee='$Appfee',Currentsession='$currentsession' WHERE id = $candidate";


if (mysqli_query($conn, $kolo )) 

     {
               $reportalert= "<script type ='text/javascript'>
                      alert('you have successfully updated an application fee record');
                      window.location.href='aparameter.php';
                         </script>";
            }
         }
       }

}



if (!empty($reportalert)){echo $reportalert;}
?>