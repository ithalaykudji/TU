<?php if(!isset($_SESSION[''])){session_start();}
    if(!isset($_SESSION['id-user'])){header("Location: ./");exit;}
    require_once("Application/controller/script.php");
?>

<!DOCTYPE html>
<html lang="id">
    <head><?php require_once("Application/access/header.php")?></head>
    <body>
        <?php require_once("Application/access/navbar.php")?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mt-3">Data Wisuda</h3>
                    <?php if(!isset($_GET['to']) || empty($_GET['to'])){?>
                        <div class="row flex-wrap">
                            <div class="col-lg-4">
                                <a href="data-wisuda?to=1">
                                    <div class="card card-body border-0 shadow">
                                        <h5>Teknik Sipil</h5> 
                                        <p><?= $countProdiSipil?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="data-wisuda?to=2">
                                    <div class="card card-body border-0 shadow">
                                        <h5>Teknik Arsitektur</h5>
                                        <p><?= $countProdiArsitek?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="data-wisuda?to=3">
                                    <div class="card card-body border-0 shadow">
                                        <h5>Teknik Ilmu Komputer</h5>
                                        <p><?= $countProdiIlkom?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php }if(isset($_GET['to'])){if($_GET['to']==1){?>
                        <a href="data-wisuda" class="btn btn-dark btn-sm">Back</a>
                        <div class="card card-body border-0 shadow mt-2">
                            <table class="table table-bordered table-sm small text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Kode PT</th>
                                        <th scope="col">Noreg</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">JK</th>
                                        <th scope="col">TTL</th>
                                        <th scope="col">Tgl Masuk</th>
                                        <th scope="col">Tgl Lulus</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Predikat Lulus</th>
                                        <th scope="col">Tahun Wisuda</th>
                                        <th scope="col">Wisuda Ke</th>
                                        <th scope="col">Lama Studi</th>
                                        <th scope="col">Jenjang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($wisudaMahasiswaSipil)==0){?>
                                    <tr>
                                        <th colspan="15">Belum ada data.</th>
                                    </tr>
                                    <?php }$no=1; if(mysqli_num_rows($wisudaMahasiswaSipil)>0){while($row=mysqli_fetch_assoc($wisudaMahasiswaSipil)){?>
                                    <tr>
                                        <th scope="row"><?= $no;?></th>
                                        <td><?= $row['kode_pt']?></td>
                                        <td><?= $row['noreg']?></td>
                                        <td><?= $row['nama']?></td>
                                        <td><?= $row['prodi']?></td>
                                        <td><?= $row['jk']?></td>
                                        <td><?= $row['ttl']?></td>
                                        <td><?= $row['tgl_masuk']?></td>
                                        <td><?= $row['tgl_lulus']?></td>
                                        <td><?= $row['ipk']?></td>
                                        <td><?= $row['predikat_lulus']?></td>
                                        <td><?= $row['tahun_wisuda']?></td>
                                        <td><?= $row['wisuda_ke']?></td>
                                        <td><?= $row['lama_studi']?></td>
                                        <td><?= $row['jenjang']?></td>
                                    </tr>
                                    <?php $no++; }}?>
                                </tbody>
                            </table>
                        </div>
                    <?php }if($_GET['to']==2){?>
                        <a href="data-wisuda" class="btn btn-dark btn-sm">Back</a>
                        <div class="card card-body border-0 shadow mt-2">
                            <table class="table table-bordered table-sm small text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Kode PT</th>
                                        <th scope="col">Noreg</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">JK</th>
                                        <th scope="col">TTL</th>
                                        <th scope="col">Tgl Masuk</th>
                                        <th scope="col">Tgl Lulus</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Predikat Lulus</th>
                                        <th scope="col">Tahun Wisuda</th>
                                        <th scope="col">Wisuda Ke</th>
                                        <th scope="col">Lama Studi</th>
                                        <th scope="col">Jenjang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($wisudaMahasiswaArsitek)==0){?>
                                    <tr>
                                        <th colspan="15">Belum ada data.</th>
                                    </tr>
                                    <?php }$no=1; if(mysqli_num_rows($wisudaMahasiswaArsitek)>0){while($row=mysqli_fetch_assoc($wisudaMahasiswaArsitek)){?>
                                    <tr>
                                        <th scope="row"><?= $no;?></th>
                                        <td><?= $row['kode_pt']?></td>
                                        <td><?= $row['noreg']?></td>
                                        <td><?= $row['nama']?></td>
                                        <td><?= $row['prodi']?></td>
                                        <td><?= $row['jk']?></td>
                                        <td><?= $row['ttl']?></td>
                                        <td><?= $row['tgl_masuk']?></td>
                                        <td><?= $row['tgl_lulus']?></td>
                                        <td><?= $row['ipk']?></td>
                                        <td><?= $row['predikat_lulus']?></td>
                                        <td><?= $row['tahun_wisuda']?></td>
                                        <td><?= $row['wisuda_ke']?></td>
                                        <td><?= $row['lama_studi']?></td>
                                        <td><?= $row['jenjang']?></td>
                                    </tr>
                                    <?php $no++; }}?>
                                </tbody>
                            </table>
                        </div>
                    <?php }if($_GET['to']==3){?>
                        <a href="data-wisuda" class="btn btn-dark btn-sm">Back</a>
                        <div class="card card-body border-0 shadow mt-2">
                            <table class="table table-bordered table-sm small text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">Kode PT</th>
                                        <th scope="col">Noreg</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">JK</th>
                                        <th scope="col">TTL</th>
                                        <th scope="col">Tgl Masuk</th>
                                        <th scope="col">Tgl Lulus</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Predikat Lulus</th>
                                        <th scope="col">Tahun Wisuda</th>
                                        <th scope="col">Wisuda Ke</th>
                                        <th scope="col">Lama Studi</th>
                                        <th scope="col">Jenjang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($wisudaMahasiswaIlkom)==0){?>
                                    <tr>
                                        <th colspan="15">Belum ada data.</th>
                                    </tr>
                                    <?php }$no=1; if(mysqli_num_rows($wisudaMahasiswaIlkom)>0){while($row=mysqli_fetch_assoc($wisudaMahasiswaIlkom)){?>
                                    <tr>
                                        <th scope="row"><?= $no;?></th>
                                        <td><?= $row['kode_pt']?></td>
                                        <td><?= $row['noreg']?></td>
                                        <td><?= $row['nama']?></td>
                                        <td><?= $row['prodi']?></td>
                                        <td><?= $row['jk']?></td>
                                        <td><?= $row['ttl']?></td>
                                        <td><?= $row['tgl_masuk']?></td>
                                        <td><?= $row['tgl_lulus']?></td>
                                        <td><?= $row['ipk']?></td>
                                        <td><?= $row['predikat_lulus']?></td>
                                        <td><?= $row['tahun_wisuda']?></td>
                                        <td><?= $row['wisuda_ke']?></td>
                                        <td><?= $row['lama_studi']?></td>
                                        <td><?= $row['jenjang']?></td>
                                    </tr>
                                    <?php $no++; }}?>
                                </tbody>
                            </table>
                        </div>
                    <?php }}?>
                </div>
            </div>
        </div>
        <?php require_once("Application/access/footer.php")?>
    </body>
</html>