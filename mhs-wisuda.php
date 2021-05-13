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
                    <!-- Button insert -->
                    <button type="button" class="btn btn-info mt-5 mb-n4" data-toggle="modal" data-target="#mhs-wisuda">
                        Input Mahasiswa
                    </button>
                    <div class="modal fade" id="mhs-wisuda" tabindex="-1" aria-labelledby="mhs-wisudaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p>Mahasiswa Wisuda</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Noreg</label>
                                            <input type="number" name="noreg" class="form-control" placeholder="Nomor Registrasi" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jk" class="form-control" required>
                                                <option>Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Tanggal Lahir</label>
                                            <input type="date" name="ttl" class="form-control" placeholder="TTL" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Masuk</label>
                                            <input type="date" name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Lulus</label>
                                            <input type="date" name="tgl_lulus" class="form-control" placeholder="Tanggal Lulus" required>
                                        </div>
                                        <div class="form-group">
                                            <label>IPK</label>
                                            <input type="number" name="ipk" class="form-control" placeholder="IPK" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Predikat Lulus</label>
                                            <input type="text" name="predikat_lulus" class="form-control" placeholder="Predikat Kelulusan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Wisuda</label>
                                            <input type="number" name="tahun_wisuda" class="form-control" placeholder="Tahun Wisuda" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Wisuda Ke</label>
                                            <input type="number" name="wisuda_ke" class="form-control" placeholder="Wisuda Ke" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Lama Wisuda</label>
                                            <input type="number" name="lama_studi" class="form-control" placeholder="Lama Studi" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark btn-sm shadow" data-dismiss="modal">Keluar</button>
                                        <button type="submit" name="simpan-mhs" class="btn btn-info btn-sm shadow">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body border-0 shadow mt-5">
                        <table class="table table-bordered table-sm small">
                            <thead>
                                <tr style="border-top: hidden;">
                                    <th scope="col">NO</th>
                                    <th scope="col">NO REGIS</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">JK</th>
                                    <th scope="col">TTL</th>
                                    <th scope="col">TANGGAL MASUK</th>
                                    <th scope="col">TANGGAL LULUS</th>
                                    <th scope="col">IPK</th>
                                    <th scope="col">PREDIKAT</th>
                                    <th scope="col">TAHUN WISUDA</th>
                                    <th scope="col">WISUDA KE</th>
                                    <th scope="col">LAMA STUDI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; if(mysqli_num_rows($mahasiswa)){while($row=mysqli_fetch_assoc($mahasiswa)){?>
                                <tr>
                                    <th scope="row"><?= $no;?></th>
                                    <td><?= $row['noreg']?></td>
                                    <td><?= $row['nama']?></td>
                                    <td><?= $row['jk']?></td>
                                    <td><?= $row['ttl']?></td>
                                    <td><?= $row['tgl_masuk']?></td>
                                    <td><?= $row['tgl_lulus']?></td>
                                    <td><?= $row['ipk']?></td>
                                    <td><?= $row['predikat_lulus']?></td>
                                    <td><?= $row['tahun_wisuda']?></td>
                                    <td><?= $row['wisuda_ke']?></td>
                                    <td><?= $row['lama_studi']?></td>
                                </tr>
                                <?php $no++; }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("Application/access/footer.php")?>
    </body>
</html>