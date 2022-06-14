<?php  

session_start();

$servername="localhost";
  $username="root";
  $password="";
  $dbname="foundation";

// establishing connection with the server by passing servername, user_id, password and database name as the peremeters
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['clicklogin'])){
    $emal = trim(strip_tags($_POST['emal']));
    $pwd = trim(strip_tags($_POST['pwd']));
    
    //$mkode = trim(strip_tags($_POST['mkode']));
    //$dkode . trim(strip_tags($_POST['dkode']))



  $dopwd='kokoro'.$pwd;
   $hpwd=md5($dopwd);
echo $dopwd;
  
  if($emal == "" || $pwd == ""){
  $reportalert="<script type ='text/javascript'>
  alert('please do not submit an empty form.');
  </script>";
     

 }
 

 else if(!filter_var($emal,FILTER_VALIDATE_EMAIL)){
        $reportalert ='<script type="text/javascript">
        alert("The email provided is invalid, please retry.");
        </script>';
          
    }
                             
        else{
      //selecting database
$db= mysqli_select_db($conn, $dbname);


//sql query to fetch info. of registered user and finds user match.  

$query = mysqli_query($conn, "SELECT *FROM applicants WHERE emal='$emal' AND hpwd = '$hpwd' LIMIT 1");
 while ($row=mysqli_fetch_assoc($query)) {
    $fulln = $row['fulln'];
    $emal=$row['emal'];
    $sid=$row['id'];
           
}
$rows = mysqli_num_rows($query);
if ($rows == 1){

$reportalert='<script type="text/javascript">
        alert("you have successfully logged in.")
        </script>';
     

         $plicantmail = $_SESSION['emal'] = $emal;
       $plicantfulln = $_SESSION['fulln'] = $fulln;
       $plicantid=$_SESSION['id']=$sid;

        header("Location:home.php");
       
}
else{
      
  $reportalert='<script type="text/javascript">
        alert("The username and password provided is invalid.")
        </script>';
      header("Location:login.php");
     

}


}

}

?>



<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Login to your account : BOS Academy </title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
           <?php if (!empty($reportalert)){echo $reportalert;}?>
   <!--preloader-->
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="back-link">
                <a href="index.php" class="btn btn-add">Back to Homepage</a>
            </div>
            <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">

                                <h3>Login</h3>
                                <small><strong><span style="color:#fff;">Please enter your email and password to login</strong></small>

                                 <?php if (!empty($reportalert)){echo'<h4>'.$reportalert.'</h4>';}?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action=""  method="POST" id="loginForm" novalidate>
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" title="Please enter you email" required="" value="" name="emal" id="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password"  value="" name="pwd" id="password" class="form-control">
                               
                            </div>
                            <div>
                                <button type="submit" name="clicklogin" class="btn btn-warning">Login</button> <br><br>
                                <a class="btn btn-add" href="register.php">Register
                         if you do not have an account yet</a><br><br>
                           <a href="forgot.php"><span style="color:#78771b;"> Forgot password,click here.</a><br><br>
                

                            </div>

                        </form>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>

<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:07 GMT -->
</html>