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
        $newMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_baru JOIN prodi ON mahasiswa_baru.id_prodi=prodi.id_prodi ORDER BY mahasiswa_baru.id_mhs DESC");
        $selectProdi=mysqli_query($conn, "SELECT * FROM prodi");
        if(isset($_POST['simpan-mhs-baru'])){
            if(mahasiswa_baru($_POST)>0){
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                $_SESSION['message-success']="Data mahasiswa berhasil dimasukan.";
                header("Location: mhs-baru"); exit;
            }
        }
        if(isset($_POST['ubah-mhsBaru'])){
            if(mahasiswa_baru_ubah($_POST)>0){
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                $_SESSION['message-success']="Data mahasiswa berhasil diubah.";
                header("Location: mhs-baru"); exit;
            }
        }
        if(isset($_POST['hapus-mhsBaru'])){
            if(mahasiswa_baru_hapus($_POST)>0){
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                $_SESSION['message-success']="Data mahasiswa berhasil dihapus.";
                header("Location: mhs-baru"); exit;
            }
        }
        $wisudaMahasiswa=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda JOIN prodi ON mahasiswa_wisuda.id_prodi=prodi.id_prodi ORDER BY mahasiswa_wisuda.id_mhs DESC");
        if(isset($_POST['simpan-mhsWisuda'])){
            if(mahasiswa_wisuda($_POST)>0){
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                $_SESSION['message-success']="Data mahasiswa wisuda berhasil dimasukan.";
                header("Location: mhs-wisuda"); exit;
            }
        }
        if(isset($_POST['ubah-mhsWisuda'])){
            if(mahasiswa_wisuda_ubah($_POST)>0){
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                $_SESSION['message-success']="Data mahasiswa wisuda berhasil diubah.";
                header("Location: mhs-wisuda"); exit;
            }
        }
        if(isset($_POST['hapus-mhsWisuda'])){
            if(mahasiswa_wisuda_hapus($_POST)>0){
                if(isset($_SESSION['message-danger'])){unset($_SESSION['message-danger']);}
                $_SESSION['message-success']="Data mahasiswa wisuda berhasil dihapus.";
                header("Location: mhs-wisuda"); exit;
            }
        }
    }