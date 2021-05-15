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
        $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-prodi']))));
        if(empty($id_prodi)){
            $_SESSION['message-danger']="Kamu belum memilih Program Studi!";
            header("Location: mhs-baru");return false;
        }
        $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
        $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
        if(empty($jk)){
            $_SESSION['message-danger']="Kamu belum memasukan Jenis Kelamin!";
            header("Location: mhs-baru");return false;
        }
        $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
        $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
        $asal_sekolah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['asal-sekolah']))));
        $nilai_tes=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nilai-tes']))));
        mysqli_query($conn, "INSERT INTO mahasiswa_baru(id_prodi,noreg,nama,jk,ttl,tgl_masuk,asal_sklh,nilai_tes) VALUES('$id_prodi','$noreg','$nama','$jk','$ttl','$tgl_masuk','$asal_sekolah','$nilai_tes')");
        return mysqli_affected_rows($conn);
    }
    function mahasiswa_baru_ubah($data){global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
        $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-prodi']))));
        if(empty($id_prodi)){
            $_SESSION['message-danger']="Kamu belum memilih Program Studi!";
            header("Location: mhs-baru");return false;
        }
        $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
        $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
        if(empty($jk)){
            $_SESSION['message-danger']="Kamu belum memasukan Jenis Kelamin!";
            header("Location: mhs-baru");return false;
        }
        $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
        $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
        $asal_sekolah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['asal-sekolah']))));
        $nilai_tes=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nilai-tes']))));
        mysqli_query($conn, "UPDATE mahasiswa_baru SET id_prodi='$id_prodi', noreg='$noreg', nama='$nama', jk='$jk', ttl='$ttl', tgl_masuk='$tgl_masuk', asal_sklh='$asal_sekolah', nilai_tes='$nilai_tes' WHERE id_mhs='$id_mhs'");
        return mysqli_affected_rows($conn);
    }
    function mahasiswa_baru_hapus($data){global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
        mysqli_query($conn, "DELETE FROM mahasiswa_baru WHERE id_mhs='$id_mhs'");
        return mysqli_affected_rows($conn);
    }
    function mahasiswa_wisuda($data){global $conn;
        $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-prodi']))));
        if(empty($id_prodi)){
            $_SESSION['message-danger']="Kamu belum memilih Program Studi!";
            header("Location: mhs-baru");return false;
        }
        $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
        $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
        if(empty($jk)){
            $_SESSION['message-danger']="Kamu belum memasukan Jenis Kelamin!";
            header("Location: mhs-baru");return false;
        }
        $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
        $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
        $tgl_lulus=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl-lulus']))));
        $ipk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ipk']))));
        $predikat_lulus=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['predikat-lulus']))));
        $tahun_wisuda=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun-wisuda']))));
        $wisuda_ke=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['wisuda-ke']))));
        $lama_studi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['lama-studi']))));
        $jenjang=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenjang']))));
        mysqli_query($conn, "INSERT INTO data_wisuda(id_prodi,noreg,jenjang) VALUES('$id_prodi','$noreg','$jenjang')");
        mysqli_query($conn, "INSERT INTO mahasiswa_wisuda(id_prodi,noreg,nama,jk,ttl,tgl_masuk,tgl_lulus,ipk,predikat_lulus,tahun_wisuda,wisuda_ke,lama_studi) VALUES('$id_prodi','$noreg','$nama','$jk','$ttl','$tgl_masuk','$tgl_lulus','$ipk','$predikat_lulus','$tahun_wisuda','$wisuda_ke','$lama_studi')");
        return mysqli_affected_rows($conn);
    }
    function mahasiswa_wisuda_ubah($data){global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
        $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-prodi']))));
        if(empty($id_prodi)){
            $_SESSION['message-danger']="Kamu belum memilih Program Studi!";
            header("Location: mhs-wisuda");return false;
        }
        $old_noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['old-noreg']))));
        $noreg=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['noreg']))));
        if($old_noreg!=$noreg){
            $checkNoreg=mysqli_query($conn, "SELECT * FROM mahasiswa_wisuda WHERE noreg='$noreg'");
            if(mysqli_num_rows($checkNoreg)>0){
                $_SESSION['message-danger']="Maaf, Nomor Registrasi Mahasiswa yang kamu ubah dan masukan sudah ada!";
                header("Location: mhs-wisuda");return false;
            }
        }
        $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
        $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
        if(empty($jk)){
            $_SESSION['message-danger']="Kamu belum memasukan Jenis Kelamin!";
            header("Location: mhs-wisuda");return false;
        }
        $ttl=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ttl']))));
        $tgl_masuk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl_masuk']))));
        $tgl_lulus=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl-lulus']))));
        $ipk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ipk']))));
        $predikat_lulus=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['predikat-lulus']))));
        $tahun_wisuda=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun-wisuda']))));
        $wisuda_ke=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['wisuda-ke']))));
        $lama_studi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['lama-studi']))));
        $jenjang=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenjang']))));
        mysqli_query($conn, "UPDATE data_wisuda SET id_prodi='$id_prodi', noreg='$noreg', jenjang='$jenjang' WHERE noreg='$old_noreg'");
        mysqli_query($conn, "UPDATE mahasiswa_wisuda SET id_prodi='$id_prodi', noreg='$noreg', nama='$nama', jk='$jk', ttl='$ttl', tgl_masuk='$tgl_masuk', tgl_lulus='$tgl_lulus', ipk='$ipk', predikat_lulus='$predikat_lulus', tahun_wisuda='$tahun_wisuda', wisuda_ke='$wisuda_ke', lama_studi='$lama_studi' WHERE id_mhs='$id_mhs'");
        return mysqli_affected_rows($conn);
    }
    function mahasiswa_wisuda_hapus($data){global $conn;
        $id_mhs=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mhs']))));
        mysqli_query($conn, "DELETE FROM mahasiswa_wisuda WHERE id_mhs='$id_mhs'");
        return mysqli_affected_rows($conn);
    }
    // function __($data){global $conn;}
}