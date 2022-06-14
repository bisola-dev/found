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
  $dbname= "foundation";

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
                         </script>";           
}




//echo $dreg.''.$plicantmail.''.$plicantid;
if (isset($_POST['edit'])){
    $candid2 = trim(strip_tags($_POST['candid']));}



if (isset($_POST['update'])){
   //mysqli_real_escape_string($con,$_POST["pass1"]);
     $candid2 = trim(strip_tags($_POST['candid12']));
      $jambreg= trim(strip_tags($_POST['jambreg']));
      $subject1 = trim(strip_tags($_POST['subject1']));
      $mark1 = trim(strip_tags($_POST['mark1']));
      $subject2 = trim(strip_tags($_POST['subject2']));
      $mark2 = trim(strip_tags($_POST['mark2']));
      $subject3 = trim(strip_tags($_POST['subject3']));
      $mark3 = trim(strip_tags($_POST['mark3']));
      $subject4 = trim(strip_tags($_POST['subject4']));
      $mark4 = trim(strip_tags($_POST['mark4']));

       echo $jambreg;
      //echo $sitting.''.$examtype.''.$examnum.''.$examyear;
//echo $subject1.''.$grading1;

if($subject1== "" || $mark1== ""||$subject2== "" || $mark2== ""||$subject3== "" || $mark3== ""||$subject4== "" || $mark4== "")
{ 
  $reportalert="<script type ='text/javascript'>
  alert('please do not submit empty form.')
  </script>";
      $reportalert="do not submit an empty form.";}


$counter = 1; 
while ($counter < 5) {                    
 $subid = trim(strip_tags($_POST['subject'.$counter]));
  $subval = explode(',',$subid);
  
  //$subval = trim(strip_tags($_POST['subject'.$counter]));//$subject.$counter;
  $graval = trim(strip_tags($_POST['mark'.$counter]));
  if($subval!=""){
    $newme = mysqli_query($conn, "UPDATE jambrecord SET Jambreg='$jambreg', studentid='$plicantid',subject='$subval[0]', mark='$graval' WHERE id = $subval[1]");
  }    
    $counter++;          
}   
                        
 

  $reportalert="<script type ='text/javascript'>
                      alert('Jamb results  successfully updated');
                      window.location.href='viewjamb.php';
                         </script>"; 

 
}


$cc=1;

$query1 = mysqli_query($conn, "SELECT * FROM jambrecord WHERE studentid = $plicantid");
$counter= mysqli_num_rows($query1);        
while ($row = mysqli_fetch_assoc($query1)) {
       $subject[$cc] = $row['subject'];
       $mark[$cc] = $row['mark'];
       $subid[$cc] = $row['id'];
       $jambreg = $row['jambreg'];
       $cc++;
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
                  <h1>Upload Jamb result. </h1>
                 <small><?php echo $plicantfulln;?>, please  upload  your Jamb result here .</small>
                    
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
                           <form class="col-sm-12" method = "post" action = "">
                              <div class="form-group">
                                 <div class="row">

               
                                <div class="form-group col-lg-7">
                                   <label>Jamb Registration Number</label>
                                    <input type="text"  id="username" class="form-control" name="jambreg"
                                   value="<?php echo $jambreg;?>">
                                  
                                </div>
                                
<br>
<br>
                              <?php 
                              $numberz = 1;
                              while ($numberz < 5 ){

                              ?>



                             
                                <div class="form-group col-lg-6">
                                    

                                    <label>Subject</label>

                                 <select type="form-control" name="subject<?php echo $numberz;?>">
                                     <option value="<?php echo $subject[$numberz].','.$subid[$numberz];?>"><?php echo $subject[$numberz];?></option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject ORDER BY subjects ASC ");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin.','.$subid[$numberz];?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>



                                <div class="form-group col-lg-4">
                                  <input type="hidden" name="candid12"  value="<?php echo $candid2;?>">
                                    <label>Score</label>
                                <input type="text" name="mark<?php echo $numberz;?>" value="<?php echo $mark[$numberz];?>">
                                   
                                    
                                    
                              
                        </div>

                          


<?php $numberz++;}?>

       <div>
        <div class="form-group col-lg-4">
        <button type="submit" name="update" class="btn btn-danger">UPDATE</button></div>
                  
       </form>

       
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

