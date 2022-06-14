<?php 
session_start();
 $plicantmail = $_SESSION['emal'];
 $plicantfulln = $_SESSION['fulln'];


$servername="localhost";
  $username="root";
  $password="";
  $dbname="myschool";

// establishing connection with the server by passing servername, user_id, password and database name as the peremeters
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

if (isset($_POST['submit'])){
   //mysqli_real_escape_string($con,$_POST["pass1"]);
    $session = mysqli_real_escape_string($conn, $_POST['session']);
      $cdate = mysqli_real_escape_string($conn, $_POST['cdate']);
      $Appfee = mysqli_real_escape_string($conn, $_POST['Appfee']);
      

echo $session.''.$cdate.' '.$Appfee;

$query2 = mysqli_query($conn, "SELECT * FROM app WHERE psession='$session'" );
$num_rows = mysqli_num_rows($query2);

   if($session == "" || $cdate == "" || $Appfee == "") {
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
  


  else if ($num_rows > 0){ 
// do not insert
echo $session_error = "<script type ='text/javascript'>
                      alert('this session already exist');
                      window.location.href='aparameter.php';
                         </script>";
  
} 


      else{      
     $greg = "INSERT INTO app (psession,closingdate,applicationfee) VALUES ( '{$session}','{$cdate}','{$Appfee}')";
      if (mysqli_query($conn, $greg)) {
               $reportalert= "<script type ='text/javascript'>
                      alert('you have successfully uploaded an Upload 0'level');
                      window.location.href='aparameter.php';
                         </script>";
            }else{

               echo var_dump($greg);
            }
               echo var_dump($greg);

         }
       }

   
$TOPE = mysqli_query($conn, "SELECT * FROM 0record");


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
                     <!-- Orders -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown"> 
                        <i class="pe-7s-cart"></i>
                        <span class="label label-primary">5</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li >
                                    <!-- start Orders -->
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/basketball-jersey.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>polo shirt</h4>
                                       <p><strong>total item:</strong> 21
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/shirt.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Kits</h4>
                                       <p><strong>total item:</strong> 11
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/football.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Football</h4>
                                       <p><strong>total item:</strong> 16
                                       </p>
                                    </a>
                                 </li>
                                 <li class="nav-list">
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/shoe.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Sports sheos</h4>
                                       <p><strong>total item:</strong> 10
                                       </p>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Messages -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <!-- start message -->
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Ronaldo</h4>
                                       <p>Please oreder 10 pices of kits..</p>
                                       <span class="badge badge-success badge-massege"><small>15 hours ago</small>
                                       </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Leo messi</h4>
                                       <p>Please oreder 10 pices of Sheos..</p>
                                       <span class="badge badge-info badge-massege"><small>6 days ago</small>
                                       </span>   
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left" >
                                          <img src="assets/dist/img/avatar3.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Modric</h4>
                                       <p>Please oreder 6 pices of bats..</p>
                                       <span class="badge badge-info badge-massege"><small>1 hour ago</small>
                                       </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar4.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Salman</h4>
                                       <p>Hello i want 4 uefa footballs</p>
                                       <span class="badge badge-danger badge-massege">
                                       <small>6 days ago</small>
                                       </span>  
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Sergio Ramos</h4>
                                       <p>Hello i want 9 uefa footballs</p>
                                       <span class="badge badge-info badge-massege"><small>5 hours ago</small>
                                       </span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Notifications -->
                     <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-bell"></i>
                        <span class="label label-warning">7</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-green"></i>Change Your font style</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-red"></i>
                                    check the system ststus..</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-yellow"></i>
                                    Add more admin...</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-yellow"></i>
                                    Add more admin...</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Tasks -->
                     <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-note2"></i>
                        <span class="label label-danger">6</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-success pull-right">50%</span>
                                       <h3><i class="fa fa-check-circle"></i> Theme color should be change</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-warning pull-right">90%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix Error and bugs</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-danger pull-right">80%</span>
                                       <h3><i class="fa fa-check-circle"></i> Sidebar color change</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-info pull-right">30%</span>   
                                       <h3><i class="fa fa-check-circle"></i> font-family should be change</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <!-- Task item -->
                                    <a href="#"  class="border-gray">
                                       <span class="label label-success pull-right">60%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix the database Error</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <!-- Task item -->
                                    <a href="#"  class="border-gray">
                                       <span class="label label-info pull-right">20%</span>
                                       <h3><i class="fa fa-check-circle"></i> data table data missing</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Help -->
                     <li class="dropdown dropdown-help hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-settings"></i></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.html">
                              <i class="fa fa-line-chart"></i> Networking</a>
                           </li>
                           <li><a href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a></li>
                           <li><a href="#"><i class="fa fa-bar-chart"></i> Settings</a></li>
                           <li><a href="login.html">
                              <i class="fa fa-wifi"></i> wifi</a>
                           </li>
                        </ul>
                     </li>
                     <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/dist/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.html">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li>
                           <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li>
                           <li><a href="login.html">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
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
                                    <input type="text" value="" id="username" class="form-control" name="Examnum">
                                  
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

                                 <select class="form-control" name="subject">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject ORDER BY subjects ASC ");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 

  ?>

  <tr>
   <th> SUBJECTS</th>
</tr>
 



                                       <td><?php echo $cussin?></td>
                                       <td><form method="POST" action="" >
<input type="hidden"  value= "<?php echo $crease;?>" name="crease">
<p><input type="submit" name="delete" value="delete course"> </p>
 
</td> <?php $count++;} ?>
                                       
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                   

                           </select>
                        </div>

                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading">
                                    <option value="click to select"> click to select</option>
                                     <option value="A1"> A1</option>
                                     <option value="A2"> A2</option>
                                    <option value="B2"> B2</option>
                                    <option value="B3"> B3</option>
                                    <option value="C4"> C4</option>
                                    <option value="C5"> C5</option>
                                    <option value="C6"> C6</option>
                                    <option value="C7"> C7</option>
                                    <option value="D7"> D7</option>
                                    <option value="E8"> E8</option>
                                    <option value="F9"> F9</option>

                            </select>
                              </div>
                         
                              
                                <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="examyear">
                                     <option>click to select</option>
                                     <?php $queryty = mysqli_query($conn,"SELECT * FROM subject ORDER BY subjects ASC");
                            while ($row=mysqli_fetch_assoc($queryty)) {
                              $cussin = $row['subjects'];
 
  ?>
                                    
                              <option value="<?php echo $cussin;?>"><?php echo $cussin;?></option> 
                                      <?php } ?>

                           </select>
                        </div>

                              
                                <div class="form-group col-lg-6">
                                    <label>Grades</label>
                                 <select class="form-control" name="grading">
                                    <option value="click to select"> click to select</option>
                                     <option value="A1"> A1</option>
                                     <option value="A2"> A2</option>
                                    <option value="B2"> B2</option>
                                    <option value="B3"> B3</option>
                                    <option value="C4"> C4</option>
                                    <option value="C5"> C5</option>
                                    <option value="C6"> C6</option>
                                    <option value="C7"> C7</option>
                                    <option value="D7"> D7</option>
                                    <option value="E8"> E8</option>
                                    <option value="F9"> F9</option>

                            </select>
                              </div>
                          <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject">
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
                                 <select class="form-control" name="grading">
                                     <option value="click to select"> click to select</option>
                                     <option value="A1"> A1</option>
                                     <option value="A2"> A2</option>
                                    <option value="B2"> B2</option>
                                    <option value="B3"> B3</option>
                                    <option value="C4"> C4</option>
                                    <option value="C5"> C5</option>
                                    <option value="C6"> C6</option>
                                    <option value="C7"> C7</option>
                                    <option value="D7"> D7</option>
                                    <option value="E8"> E8</option>
                                    <option value="F9"> F9</option>

                            </select>
                              </div>

                               <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject">
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
                                 <select class="form-control" name="grading">
                                     <option value="click to select"> click to select</option>
                                     <option value="A1"> A1</option>
                                     <option value="A2"> A2</option>
                                    <option value="B2"> B2</option>
                                    <option value="B3"> B3</option>
                                    <option value="C4"> C4</option>
                                    <option value="C5"> C5</option>
                                    <option value="C6"> C6</option>
                                    <option value="C7"> C7</option>
                                    <option value="D7"> D7</option>
                                    <option value="E8"> E8</option>
                                    <option value="F9"> F9</option>

                            </select>
                              </div>




                               <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject">
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
                                 <select class="form-control" name="grading">
                                    <option value="click to select"> click to select</option>
                                     <option value="A1"> A1</option>
                                     <option value="A2"> A2</option>
                                    <option value="B2"> B2</option>
                                    <option value="B3"> B3</option>
                                    <option value="C4"> C4</option>
                                    <option value="C5"> C5</option>
                                    <option value="C6"> C6</option>
                                    <option value="C7"> C7</option>
                                    <option value="D7"> D7</option>
                                    <option value="E8"> E8</option>
                                    <option value="F9"> F9</option>


                            </select>
                              </div>

                               <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject">
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
                                 <select class="form-control" name="grading">
                                    <option value="click to select"> click to select</option>
                                     <option value="A1"> A1</option>
                                     <option value="A2"> A2</option>
                                    <option value="B2"> B2</option>
                                    <option value="B3"> B3</option>
                                    <option value="C4"> C4</option>
                                    <option value="C5"> C5</option>
                                    <option value="C6"> C6</option>
                                    <option value="C7"> C7</option>
                                    <option value="D7"> D7</option>
                                    <option value="E8"> E8</option>
                                    <option value="F9"> F9</option>


                            </select>
                              </div>

                               <div class="form-group col-lg-6">
                                    <label>Subject </label>

                                 <select class="form-control" name="subject">
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
                                 <select class="form-control" name="grading">
                                   <option value="click to select"> click to select</option>
                                     <option value="A1"> A1</option>
                                     <option value="A2"> A2</option>
                                    <option value="B2"> B2</option>
                                    <option value="B3"> B3</option>
                                    <option value="C4"> C4</option>
                                    <option value="C5"> C5</option>
                                    <option value="C6"> C6</option>
                                    <option value="C7"> C7</option>
                                    <option value="D7"> D7</option>
                                    <option value="E8"> E8</option>
                                    <option value="F9"> F9</option>

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
                                    while ($row = mysqli_fetch_assoc($TOPE)) {
                                       $id = $row['id'];
                                       $session = $row['psession'];
                                       $closingdate = $row['closingdate'];
                                       $applicationfee = $row['applicationfee'];
                                       $currentsession = $row['Currentsession'];
                                       
                                      
                                    ?>
                                    <tr>
                                       <th><?php echo $id;?></th>
                                       <th><?php echo $session;?></th>
                                       <th><?php echo $closingdate;?></th>
                                       <th><?php echo $applicationfee;?></th>
                                       <th><?php echo $currentsession;?></th>
                                      
                                   
                                       
                                       <th><form method="post"  action="editsession.php">
                                       <input type="hidden" name="candidate" value="<?php echo $id;?>">
                           
                                <button type ="submit" name="submit" class="btn btn-warning">EDIT</button>       </form></th>       
                                    </tr>
                                   
                                 </tbody>
                                 <?php } ?>
                              </table>
                               </div>

                                       
                            </div>
                        </form></th>
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
            <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
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

