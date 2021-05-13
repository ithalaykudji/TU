<?php 
if(!isset($_SESSION["id-user"])){
    function registration($data){
        global $conn;
        $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
        $checkNIP=mysqli_query($conn, "SELECT * FROM users WHERE nip='$nip'");
        if(mysqli_num_rows($checkNIP)>0){
            $_SESSION['message-danger']="Maaf, NIP yang kamu masukan sudah ada!";
            header("Location: ?auth=2/"); exit;
        }
        $username=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['username']))));
        $pass=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
        $check_lenght_pass=strlen($pass);
        if($check_lenght_pass<8){
            $_SESSION['message-danger']="Maaf, password kamu terlalu pendek (Min: 8)!";
            header("Location: ?auth=2/");return false;
        }
        $password=password_hash($pass, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users(nip,username,password) VALUES('$nip', '$username', '$password')");
        return mysqli_affected_rows($conn);
    }
    function login($data){
        global $conn;
        $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
        $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
        $checkUser=mysqli_query($conn, "SELECT * FROM users WHERE nip='$nip'");
        if(mysqli_num_rows($checkUser)>0){
            while($row=mysqli_fetch_assoc($checkUser)){
                $pass=$row['password'];
                $active=$row['id_active'];
                if($active==1){
                    if(password_verify($password, $pass)){
                        if(isset($_SESSION['message-danger'])||isset($_SESSION['message-success'])){unset($_SESSION['message-danger']);unset($_SESSION['message-success']);}
                        if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
                        $_SESSION['id-user']=$row['id_user'];
                        $_SESSION['id-role']=$row['id_role'];
                        $_SESSION['username']=$row['username'];
                    }else{
                        $_SESSION['message-danger']="Maaf, password yang kamu masukan salah. Silakan masukan ulang!";
                        header("Location: ?auth=1/");return false;
                    }
                }else if($active==2){
                    $_SESSION['message-danger']="Maaf, akun kamu belum diaktifkan oleh admin. Silakan hubungi admin untuk mempercepat proses aktifasi akun!";
                    header("Location: ?auth=1/"); return false;
                }
            }
        }else if(mysqli_num_rows($checkUser)==0){
            $_SESSION['message-danger']="maaf, akun kamu belum terdaftar";
            header("Location: ?auth=1");return false;
        }
        return mysqli_affected_rows($conn);
    }
}if(isset($_SESSION['id-user'])){
    function mahasiswa_baru($data){
        global $conn;
        $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
        $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
        if(empty($jk)){
            $_SESSION['message-danger']="Kamu belum memasukan Jenis Kelamin!";
            header("Location: mhs-baru");return false;
        }
        $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
        $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
        mysqli_query($conn, "INSERT INTO mahasiswa_baru(noreg,nama,jk,ttl,tgl_masuk) VALUES('$noreg','$nama','$jk','$ttl','$tgl_masuk')");
        return mysqli_affected_rows($conn);
    }
}