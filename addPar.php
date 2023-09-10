<?php
$ID=$_POST['ID'];
session_start();
if(!isset($_SESSION['route']))
{
    $_SESSION['route']=array();
}
$_SESSION['route'][]= $ID;
?>