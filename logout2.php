<?php



session_start();

$plicantmail = $_SESSION['emal'];
 $plicantfulln = $_SESSION['fulln'];
session_destroy();
header("Location:login.php");
exit;

  
?>