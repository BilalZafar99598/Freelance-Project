<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
?>
<?php include('../includes/functions.php'); ?>
<?php 
deleteappliance();
?>