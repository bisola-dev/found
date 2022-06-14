<?php
//require_once('connection.php');


$servername="localhost";
  $username="root";
  $password="";
  $dbname="foundation";

// establishing connection with the server by passing servername, username, password and database name as the peremeters
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Africa/Lagos');
$dreg= date('M j, Y h:i a', time());

$dkode=rand(10000, 99999);

//echo $dkode;

if (isset($_POST['register'])){
   $emal = trim(strip_tags($_POST['emal']));
   $fon = trim(strip_tags($_POST['fon']));
   $fulln = trim(strip_tags($_POST['fulln']));
   $pwd = trim(strip_tags($_POST['pwd']));
   $rpwd = trim(strip_tags($_POST['rpwd']));
   $prog = trim(strip_tags($_POST['prog']));
   $course= trim(strip_tags($_POST['course'])); 
   $mkode = trim(strip_tags($_POST['mkode'])); 

   $dopwd='kokoro'.$pwd;
   $hpwd=md5($dopwd);
   //similolu@yahoo.com08067541235kokoro12345678 simi olaoluwa1234567812345678ND fulltime67884e965bca2d76c157ff01b483a6bc4113fComputer science
echo $emal.''.$fon.''.$dopwd.' '.$fulln.''.$pwd.''.$rpwd.''.$prog.''.$mkode.''.$hpwd.''.$course;

$query2 = mysqli_query($conn, "SELECT * FROM applicants WHERE emal='$emal' || fon ='$fon'" );
$num_rows = mysqli_num_rows($query2);

  
  if($emal == "" || $fon == "" || $fulln == "" || $pwd == "" || $rpwd == "" || $prog == "" || $mkode == "") {
  echo'<script type ="text/javascript">
  alert("please do not submit empty form.");
  </script>';


 }
 
else if(!filter_var($emal,FILTER_VALIDATE_EMAIL)){
        echo'<script type="text/javascript">
        alert("The email provided is invalid, please retry.");
        </script>';
} 

    


    else if ((strlen($fon) < 11) || (!(is_numeric ($fon))) ){
                 echo'<script type="text/javascript">
        alert("The phone number invalid, please retry.");
        </script>';
} 
        
                              
  


   else if(strlen($pwd)<6){
                 $mes='<script type="text/javascript">
        alert("The password provided is less than five characters, please make sure your password is more than five characters.");
        </script>';
          $ms = "The password provided is less than five characters, please make sure your password is more than five characters. ";} 
  
      

      else if($pwd!= $rpwd){
        $mes='<script type="text/javascript">
        alert("The password and confirm password are not the same. Please retry.");
        </script>';
         } 
      


 else if (mysqli_num_rows($query2) > 0){ 
   
  echo'<script type="text/javascript">
       $report alert("This account already exist");
        </script>';
         
     }

 else { echo "i am in";

 $new = mysqli_query($conn,"INSERT INTO applicants (emal, fon, fulln,  hpwd, prog,course, dreg) VALUES('$emal','$fon','$fulln','$hpwd','$prog','$course','$dreg')");


  $loga = mysqli_query($conn, "INSERT INTO logger (uzer, activity, timereg) 
        VALUES ('$emal', 'Registered as fresh applicant', '$dreg')"); 


         header("Location: regsuccess.php");

            
}

    

}



?>






<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
<head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Register now: BOS Academy</title>
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
        <?php if (!empty($mes)){echo $mes;}?>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="back-link">
                <a href="index.php" class="btn btn-add">Back to homepage</a>
            </div>
            <div class="container-center lg">
             <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data correctly.</strong></small>
                                <?php if (!empty($ms)){echo'<h4>'.$ms.'</h4>';}?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST"  action="" >
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="text" value="" id="email" class="form-control" name="emal">
                                   
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Fullname</label>
                                    <input type="text" value="" id="username" class="form-control" name="fulln">
                                  
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" value="" id="password" class="form-control" name="pwd">
                                  
                                </div>
                                 
                                
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" value="" id="repeatpassword" class="form-control" name="rpwd">
                                      </div>
                                    <div class="form-group col-lg-6">
                                    <label>phone</label>
                                    <input type="text" value="" id="username" class="form-control" name="fon">
                                  
                              
                                </div>


                                 <div class="form-group col-lg-6"  >
                                    <label>Course</label>
                                    <select class="form-control" name="course">
                                         <option>click to select </option>  
          <?php $queryt = mysqli_query($conn,"SELECT * FROM courses");
        while ($row=mysqli_fetch_assoc($queryt)) {
                    $cuss = $row['courses'];
 
  ?>

                                    <option value="<?php echo $cuss;?>"><?php echo $cuss;?></option> 
                                      <?php } ?>

                                    
                                  </select>
                                      
                                  </div>

                                <div class="form-group col-lg-6">
                                 <label>Select program</label>
                                 <select class="form-control" name="prog">
                                     <option>click to select</option>
                                    <option value="ND fulltime"> ND full time</option>
                                    <option value="ND parttime"> ND parttime</option>
                                    <option value="HND fulltime"> HND fulltime</option>
                                    <option value="HND parttime"> HND parttime</option>
                                    
                            </select>
                              </div>
   
                             

                             
                               <div class="form-group col-lg-6">
                                    <label>Are you human ?,Type below "<?php echo $dkode;?>" </label>
                                    <input type="text" value="" id="username" class="form-control" name="mkode"> 
                              
                                </div>
                            </div>

                            <div>
                                <button type="submit" name="register" class="btn btn-add ">Register</button><br><br>
                                <a  href="login.php">Login if you are already registered</a>
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

<!-- Mirrored from thememinister.com/crm/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
</html>
