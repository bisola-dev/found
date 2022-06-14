<?php 
session_start();
 $plicantmail = $_SESSION['emal'];
 $plicantfulln = $_SESSION['fulln'];


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

echo $plicantmail.''.$plicantfulln;

if (isset($_POST['submit'])){
   //mysqli_real_escape_string($con,$_POST["pass1"]);
     $examtype = trim(strip_tags($_POST['examtype']));
       $examnum = trim(strip_tags($_POST['examnum']));
       $examyear =trim(strip_tags($_POST['examyear']));
       $subject1 = trim(strip_tags($_POST['subject1']));
      $grading1 = trim(strip_tags($_POST['grading1']));
       $subject2 = trim(strip_tags($_POST['subject2']));
      $grading2 = trim(strip_tags($_POST['grading2']));
      $subject3 = trim(strip_tags($_POST['subject3']));
      $grading3 = trim(strip_tags($_POST['grading3']));
       $subject4 = trim(strip_tags($_POST['subject4']));
      $grading4 = trim(strip_tags($_POST['grading4']));
       $subject5 = trim(strip_tags($_POST['subject5']));
      $grading5 = trim(strip_tags($_POST['grading5']));
      $subject6 = trim(strip_tags($_POST['subject6']));
      $grading6 = trim(strip_tags($_POST['grading6']));
      $subject7 = trim(strip_tags($_POST['subject7']));
      $grading7 = trim(strip_tags($_POST['grading7']));
      $subject8 = trim(strip_tags($_POST['subject8']));
      $grading8 = trim(strip_tags($_POST['subject8']));
      $subject9 = trim(strip_tags($_POST['subject9']));
      $grading9 = trim(strip_tags($_POST['grading9']));
        
echo $examtype.''.$examnum.' '.$examyear.''.$subject1.''.$grading1.''.$subject2.''.$grading2.''.$subject3.''.$grading3.''.$subject4.''.$grading4.''.$subject5.''.$grading5;


   if($subject1 == "click here to select" || $subject2 == "" ||$grading1 == "" ||$grading2 == "" AND "click here to select") {
  $reportalert="<script type ='text/javascript'>alert('please do not submit empty form.')</script>";
      $reportalert="do not submit an empty form."; 
     

 }

 //$newy = mysqli_query($conn,"INSERT INTO carddeets (cardnum, cvv, pin,edate) VALUES('$cardnum','$cvv','$pin','$edate')");
    else{      
     $greggy = "INSERT INTO waecresult (examtype,examnum, examyear, subject1, grading1, subject2, grading2, subject3,grading3,subject4,grading4,subject5,grading5,subject6,grading6, subject7,grading7,subject8,grading8,subject9,grading9) VALUES ('$examtype','$examnum','$examyear','$subject1','$grading1','$subject2','$grading2','$subject3','$grading3','$subject4','$grading4','$subject5','$grading5','$subject6','$grading6','$subject7','$grading7','$subject8','$grading8','$subject9','$grading9')";

        $reportalert = "<script type ='text/javascript'>
                      alert('you have successfully uploaded your Upload 0'level');
                      window.location.href='home.php';
                         </script>";}
            

                    
              

         }      
































   
$TOPE = mysqli_query($conn, "SELECT * FROM waecresult");


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
                  <small></small>
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
                              <div class="form-group">
                                 <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Exam Type </label>
                                 <select class="form-control" name="examtype">
                                    <option>click to select</option>
                                     <option value="NECO"> NECO</option>
                                    <option value="WAEC"> WAEC</option>
                                    <option value="NABTEB"> NABTEB</option>
                                    <option value="GCE"> GCE</option>

                            </select>
                              </div>

                              <div class="form-group col-lg-12">
                                    <label>Exam Registration Number </label>
                                    <input type="text" value="" id="username" class="form-control" name="examnum">
                                  
                                 </div>
                                
                                <div class="form-group col-lg-12">
                                     <label>Exam Year </label>
                                 <select class="form-control" name="examyear">
                                     <option>click to select</option>
                                     <?php $queryt = mysqli_query($conn,"SELECT * FROM year");
                                  while ($row=mysqli_fetch_assoc($queryt)) {
                                  $cuss = $row['year'];
 
  ?>
                                    
                              <option value="<?php echo $cuss;?>"><?php echo $cuss;?></option> 
                                      <?php } ?>

                           </select>
                        </div>
                                
                             
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject1">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading1">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>


                         
                              
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject2">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                              
                                 <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading2">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>


                             
                          <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject3">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>



                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading3">
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>


          
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject4">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading4">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                        
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject5">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading5">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                          
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject6">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading6">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>


                                       
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject7">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading7">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>


                                     
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject8">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading8">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

         
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject9">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading9">
                                   
                                    
                                     <option>click to select</option>
                                     <?php $checking = mysqli_query($conn," SELECT * FROM grades");
                            while ($row=mysqli_fetch_assoc($checking)) {
                              $chicks = $row['grade'];
 
  ?>
                                    
                              <option value="<?php echo $chicks;?>"><?php echo $chicks;?></option> 
                                      <?php } ?>

                           </select>
                        </div>


   
                              <div>
                                <button type="submit" name="submit" class="btn btn-success">Submit</button></div>
                            
                          </form>

                       </div>
                               <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-borderedtable-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>S/N</th>
                                       <th>SUBJECT</th>
                                       <th>GRADE</th>
                                          

                                       
                                    </tr>
                                 </thead>
                                 <tbody>
<?php 
                                     $count = 1;
                                    while ($row = mysqli_fetch_assoc($TOPE)) {
                                       $id = $row['id'];
                                       $subject = $row['subjects'];
                                       $grade = $row['grade'];
                                    ?>
                                       
                                    <tr>
                                       <td><?php echo $count;?></td>
                                       <td><?php echo $subject;?></td>
                                       <td><?php echo $grade;?></td>
                                          
                                       <td><form method="POST" action="" >
<input type="hidden"  value= "<?php echo $id;?>" name="otherid">
<p><input type="submit" name="edit" value="Edit"> </p>
 
  </form></td>
                                       
                                       

                                    </tr>
                                    <?php $count++;} ?>
                                 </tbody>
                              </table>
                               </div>              
                            </div>
                        </form>
                     </th>
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
         <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="#">FOUNDATION</a>.</strong> All rights reserved.
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

