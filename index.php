<?php if(!isset($_SESSION[''])){session_start();}
    require_once("Application/controller/script.php");
?>

<!DOCTYPE html>
<html lang="id">
    <head><?php require_once("Application/access/header.php")?></head>
    <body>
        <?php require_once("Application/access/navbar.php")?>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <?php if(!isset($_GET['auth'])){?>
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        fakultas
                        <span class="text-primary">teknik</span>
                    </h1>
                    <p class="lead mb-5"><strong>Visi</strong> Menjadi komunitas ilmiah yang unggul. Berkarakter dan kompetitif dalam bidang teknik sipil, Arsitektur serta Teknik Informatika berdasarkan nilai - nilai kristiani yang berwawasan global dan berakar pada budaya lokal.</p>
                    <p class="lead mb-5"><strong>Misi</strong> (1) Menyelenggarakan Tri Dharma Perguruan Tinggi di bidang Teknik yang berkualitas dan berkarakter; (2) Mewujudkan spritual St. Arnoldus Yanssen dalam bidang Teknik Sipil, Arsitektur, dan Teknik Informatika; (3) Mewujudkan kerjasama secara lokal dan nasional dalam bidang Teknik Sipil, Arsitektur, dan Teknik Informatika; (4) Menghasilkan lulusan yang bermutu di bidang Teknik Sipil, Arsitektur, dan Teknik Informatika.</p>
                </div>
            </section>
            <?php }if(isset($_GET['auth'])){if($_GET['auth']==1){?>
            <!-- Login -->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h2 class="mb-0">Login</h2>
                    <form method="POST" class="mt-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autofocus>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-info">Masuk</button>
                    </form>
                </div>
            </section>
            <?php }else if($_GET['auth']==2){?>
            <!-- Registration -->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h2 class="mb-0">Registration</h2>
                    <form method="POST" class="mt-5">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp" placeholder="Nama" autofocus>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autofocus>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" name="registrasi" class="btn btn-info">Daftar</button>
                    </form>
                </div>
            </section>
            <?php }}if(isset($_SESSION['id-user'])){?><?php }?>
        </div>
        <?php require_once("Application/access/navbar.php")?>
    </body>
</html>