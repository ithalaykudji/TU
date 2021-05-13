<?php
    require_once("functions.php"); require_once("connect.php");
    if(!isset($_SESSION["id-user"])){
        if(isset($_POST['registrasi'])){
            if(registration($_POST)>0){
                $_SESSION['message-success']="Akun anda berhasil dibuat,silahkan login";
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                header("Location: ?auth=1/");exit;
            }
        }
        if(isset($_POST['login'])){
            if(login($_POST)>0){
                header("Location: ./"); exit;
            }
        }
    }if(isset($_SESSION['id-user'])){
        $new_mhs=mysqli_query($conn, "SELECT * FROM mahasiswa_baru");
        $count_mhs=mysqli_num_rows($new_mhs);
        $wsd_mhs=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda");
        $count_wsd=mysqli_num_rows($wsd_mhs);
        $newMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_baru");
        $wisudaMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda");
        if(isset($_POST['simpan-mhs-baru'])){
            if(mahasiswa_baru($_POST)>0){
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                $_SESSION['message-success']="Data mahasiswa berhasil dimasukan.";
                header("Location: mhs-baru"); exit;
            }
        }
    }