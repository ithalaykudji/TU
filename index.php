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
            <?php if(!isset($_SESSION['id-user'])){if(!isset($_GET['auth'])){?>
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
                            <?php if(isset($_SESSION["message-success"])){?>
                                <div class="alert alert-success alert-dismissible fade show small" role="alert">
                                    <?= $_SESSION['message-success']?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }if(isset($_SESSION["message-danger"])){?>
                                <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                                    <?= $_SESSION['message-danger']?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }?>
                            <form method="POST" class="mt-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIP</label>
                                    <input type="text" name="nip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP" autofocus>
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
                            <?php if(isset($_SESSION["message-danger"])){?>
                                <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                                    <?= $_SESSION['message-danger']?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }?>
                            <form method="POST" class="mt-5">
                                <div class="form-group">
                                    <label for="exampleInputnip1">NIP</label>
                                    <input type="number" name="nip" class="form-control" id="exampleInputnip1" aria-describedby="emailHelp" placeholder="NIP" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp" placeholder="Nama" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" name="registrasi" class="btn btn-info">Daftar</button>
                            </form>
                        </div>
                    </section>
            <?php }}}if(isset($_SESSION['id-user'])){?>
                <!-- home-->
                    <section class="resume-section" id="about">
                        <div class="resume-section-content">
                            <h1 class="mb-0">Dashboard</h1>
                            <div class="row flex-wrap">
                                <div class="col-lg-4">
                                    <div class="card card-body border-0 shadow">
                                        <h5>Data Mahasiswa Baru</h5> 
                                        <p><?= $count_mhs?></p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card card-body border-0 shadow">
                                        <h5>Data Mahasiswa Wisuda</h5>
                                        <p><?= $count_wsd?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            <?php }?>
        </div>
        <?php require_once("Application/access/footer.php")?>
    </body>
</html>