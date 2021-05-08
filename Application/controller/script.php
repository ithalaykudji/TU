<?php if(!isset($_SESSION[''])){session_start();}
    require_once("functions.php"); require_once("connect.php");
    if(!isset($_SESSION["id-user"])){
        if(isset($_POST['registrasi'])){
            if(registration($_POST)>0){

            }
        }
    }if(isset($_SESSION['id-user'])){}