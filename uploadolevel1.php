<?php 
session_start();
 $plicantmail = $_SESSION['emal'];
 $plicantfulln = $_SESSION['fulln'];
  $plicantid=$_SESSION['id'];


  if (empty($plicantmail)){header("Location:login.php");}

date_default_timezone_set('Africa/Lagos');
$dreg= date('M j, Y h:i a', time());


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

$query13 = mysqli_query($conn, "SELECT * FROM payment WHERE email= '$plicantmail'");
$num_rows = mysqli_num_rows($query13);
if ($num_rows!= 1){ 
// do not insert
echo $mindcheck = "<script type ='text/javascript'>
                      alert('you have not yet applied please proceed to pay for your application fee, before uploading your credentials thanks.');
                      window.location.href='payapp.php';
                         </script>"; }


$query134= mysqli_query($conn, "SELECT * FROM examdeets 
  WHERE emal ='$plicantmail'");
$countrow = mysqli_num_rows($query134);
  if ($countrow > 0){ 
// do not insert
header("Location:olevelview.php");
}


if (isset($_POST['submit'])){
   //mysqli_real_escape_string($con,$_POST["pass1"]);
      $sitting = trim(strip_tags($_POST['sitting']));
      $examtype = trim(strip_tags($_POST['examtype']));
      $examtype2 = trim(strip_tags($_POST['examtype2']));
      $examnum = trim(strip_tags($_POST['examnum']));
      $examnum2 = trim(strip_tags($_POST['examnum2']));
      $examyear =trim(strip_tags($_POST['examyear']));
      $examyear2 =trim(strip_tags($_POST['examyear2']));


     

  //  echo $sitting.''.$examtype.''.$examnum.''.$examyear;

if($examnum == "" || $examyear== "" ||$examtype == ""|| $sitting=="")
{$reportalert="<script type ='text/javascript'>
  alert('please do not submit empty form.')
  </script>";
  $reportalert="do not submit an empty form.";}

else if (strlen($examnum) > 10||strlen($examnum2) > 10)
{$reportalert="<script type ='text/javascript'>
  alert('please enter the complete and correct exam number.')
  </script>";
 $reportalert="please enter the complete and correct exam number.";}

 
    
 else {         

$lintin = mysqli_query($conn, "INSERT INTO examdeets (sitting,studentid,examtype,examtype2,examyear,examyear2,examnum,examnum2,dreg,emal) VALUES('$sitting','$plicantid','$examtype','$examtype2','$examyear','$examyear2','$examnum','$examnum2','$dreg','$plicantmail')");

  $reportalert="<script type ='text/javascript'>
                      alert('Exam details uploaded');
                      window.location.href='uploadolevel2.php';
                         </script>"; 

 
}

}


if (!empty($reportalert)){echo $reportalert;}
?>

<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRM Admin Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
   <!--preloader-->
     
      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="index-2.html" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="assets/dist/img/mini-logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="assets/dist/img/logo.png" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
               <a href="#search"><span class="pe-7s-search"></span></a>
               <div id="search">
                  <button type="button" class="close">×</button>
                  <form>
                     <input type="search" value="" placeholder="Search.." />
                     <button type="submit" class="btn btn-add">Search...</button>
                  </form>
               </div>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
          
         </header>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <?php require_once("sidebar.php") ?>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Upload 0'level result. </h1>
                  <small> Welcome <?php echo $plicantfulln;?>, please fill in your exam details and click submit to proceed to the nextpage.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                                
                           </div>
                        </div>
                        <div class="panel-body">

                         
                           <form class="col-sm-6" method = "post" action = "">
                                <div class="form-group col-lg-12">
                                    <label>No of Sitting </label>
                                    <select class="form-control" name="sitting">
                                     <option value="">click to select</option>
                                     <option value="1"> 1</option>
                                    <option value="2"> 2</option>
                                    
                            </select>
                              </div>
                                


                              <div class="form-group">
                                 <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Exam Type </label>
                                 <select class="form-control" name="examtype">
                                      <option value="">click to select</option>
                                     <?php $checkings = mysqli_query($conn," SELECT * FROM xamtype");
                            while ($row=mysqli_fetch_assoc($checkings)) {
                              $joy = $row['examtypes'];
                             
                              
 
  ?>
                                    
                              <option value="<?php echo $joy;?>"><?php echo $joy;?></option>
                              
                                      <?php } ?>

                           </select>
                        </div>
                            
                               <div class="form-group col-lg-6">
                                    <label>Exam Type </label>
                                 <select class="form-control" name="examtype2">
                                      <option value="">click to select</option>
                                     <?php $checkings = mysqli_query($conn," SELECT * FROM xamtype");
                            while ($row=mysqli_fetch_assoc($checkings)) {
                              $joy = $row['examtypes'];
                             
                              
 
  ?>
                                    
                              <option value="<?php echo $joy;?>"><?php echo $joy;?></option>
                              
                                      <?php } ?>

                           </select>
                        </div>

                                

                              <div class="form-group col-lg-6">
                                    <label>Exam Registration Number </label>
                                    <input type="text" value="" id="username" class="form-control" name="examnum">
                                  
                                 </div>
                                
                                     <div class="form-group col-lg-6">
                                    <label>Exam Registration Number </label>
                                    <input type="text" value="" id="username" class="form-control" name="examnum2">
                                  
                                 </div>


                                <div class="form-group col-lg-6">
                                     <label>Exam Year </label>
                                 <select class="form-control" name="examyear">
                                     <option value="">click to select</option>
                                     <?php $queryt = mysqli_query($conn,"SELECT * FROM year");
                                  while ($row=mysqli_fetch_assoc($queryt)) {
                                  $cuss = $row['year'];
 
  ?>
                                    
                              <option value="<?php echo $cuss;?>"><?php echo $cuss;?></option> 
                                      <?php } ?>

                           </select>
                        </div>
                               
                               <div class="form-group col-lg-6">
                                    <label>Exam Year</label>

                                 <select class="form-control" name="examyear2">
                                     <option value="">click to select</option>
                                     <?php $queryt = mysqli_query($conn,"SELECT * FROM year");
                                  while ($row=mysqli_fetch_assoc($queryt)) {
                                  $cuss = $row['year'];
 
  ?>
                                    
                              <option value="<?php echo $cuss;?>"><?php echo $cuss;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                           
   
                              <div>
                                <button type="submit" name="submit" class="btn btn-success">Submit</button></div>
                            
                          </form>

                       </div>
                              
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->

                             </div>

                              <div class="reset-button">
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="#"> FOUNDATION </a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
   </body>

<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
</html>

