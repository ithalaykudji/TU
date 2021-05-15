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
                <!-- Welcome & Insert -->
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <h3 class="mt-4">Mahasiswa Wisuda</h3>
                            <div>
                                <button type="button" class="btn btn-info mt-3 mb-n4" data-toggle="modal" data-target="#mhs-baru">
                                    Input Mahasiswa
                                </button>
                                <div class="modal fade" id="mhs-baru" tabindex="-1" aria-labelledby="mhs-baruLabel" aria-hidden="true">
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
                                                        <label>Program Studi</label>
                                                        <select name="id-prodi" class="form-control" required>
                                                            <option>Pilih Prodi</option>
                                                            <?php foreach($selectProdi as $row_prodi):?>
                                                            <option value="<?= $row_prodi['id_prodi']?>"><?= $row_prodi['prodi']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
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
                                                        <input type="text" name="ttl" class="form-control" placeholder="TTL" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tgl Masuk</label>
                                                        <input type="date" name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tgl Lulus</label>
                                                        <input type="date" name="tgl-lulus" class="form-control" placeholder="Tanggal Lulus" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>IPK</label>
                                                        <input type="text" name="ipk" class="form-control" placeholder="IPK" required>
                                                    <div class="form-group">
                                                        <label>Predikat Lulus</label>
                                                        <input type="text" name="predikat-lulus" class="form-control" placeholder="Predikat Lulus" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tahun Wisuda</label>
                                                        <input type="number" name="tahun-wisuda" class="form-control" placeholder="Tuhan Wisuda" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Wisuda Ke</label>
                                                        <input type="number" name="wisuda-ke" class="form-control" placeholder="Wisuda-ke" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Lama Studi</label>
                                                        <input type="number" name="lama-studi" class="form-control" placeholder="Lama Studi" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenjang</label>
                                                        <input type="number" name="jenjang" class="form-control" placeholder="Jenjang" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark btn-sm shadow" data-dismiss="modal">Keluar</button>
                                                    <button type="submit" name="simpan-mhsWisuda" class="btn btn-info btn-sm shadow">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Alert & Data Table -->
                    <div class="col-md-12">
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
                        <div class="card card-body border-0 shadow">
                            <table class="table table-bordered table-sm small text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
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
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($wisudaMahasiswa)==0){?>
                                    <tr>
                                        <th colspan="15">Belum ada data.</th>
                                    </tr>
                                    <?php }$no=1; if(mysqli_num_rows($wisudaMahasiswa)>0){while($row=mysqli_fetch_assoc($wisudaMahasiswa)){?>
                                    <tr>
                                        <th scope="row"><?= $no;?></th>
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
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubah-data<?= $row['id_mhs']?>"><i class="fas fa-pen"></i> Ubah</button>
                                            <div class="modal fade" id="ubah-data<?= $row['id_mhs']?>" tabindex="-1" role="dialog" aria-labelledby="ubah-data<?= $row['id_mhs']?>Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
                                                            <input type="hidden" name="old-noreg" value="<?= $row['noreg']?>">
                                                            <div class="modal-body text-center">
                                                                <div class="form-group">
                                                                    <label>Program Studi</label>
                                                                    <select name="id-prodi" class="form-control" required>
                                                                        <option>Pilih Prodi</option>
                                                                        <?php foreach($selectProdi as $row_prodi):?>
                                                                        <option value="<?= $row_prodi['id_prodi']?>"><?= $row_prodi['prodi']?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Noreg</label>
                                                                    <input type="number" name="noreg" value="<?= $row['noreg']?>" class="form-control" placeholder="Nomor Registrasi" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input type="text" name="nama" value="<?= $row['nama']?>" class="form-control" placeholder="Nama" required>
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
                                                                    <input type="text" name="ttl" value="<?= $row['ttl']?>" class="form-control" placeholder="TTL" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tgl Masuk</label>
                                                                    <input type="date" name="tgl_masuk" value="<?= $row['tgl_masuk']?>" class="form-control" placeholder="Tanggal Masuk" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tgl Lulus</label>
                                                                    <input type="date" name="tgl-lulus" value="<?= $row['tgl_lulus']?>" class="form-control" placeholder="Tanggal Lulus" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>IPK</label>
                                                                    <input type="text" name="ipk" value="<?= $row['ipk']?>" class="form-control" placeholder="IPK" required>
                                                                <div class="form-group">
                                                                    <label>Predikat Lulus</label>
                                                                    <input type="text" name="predikat-lulus" value="<?= $row['predikat_lulus']?>" class="form-control" placeholder="Predikat Lulus" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tahun Wisuda</label>
                                                                    <input type="number" name="tahun-wisuda" value="<?= $row['tahun_wisuda']?>" class="form-control" placeholder="Tuhan Wisuda" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Wisuda Ke</label>
                                                                    <input type="number" name="wisuda-ke" value="<?= $row['wisuda_ke']?>" class="form-control" placeholder="Wisuda-ke" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Lama Studi</label>
                                                                    <input type="number" name="lama-studi" value="<?= $row['lama_studi']?>" class="form-control" placeholder="Lama Studi" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jenjang</label>
                                                                    <input type="number" name="jenjang" class="form-control" placeholder="Jenjang" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark btn-sm shadow" data-dismiss="modal">Keluar</button>
                                                                <button type="submit" name="ubah-mhsWisuda" class="btn btn-info btn-sm shadow">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><form action="" method="POST">
                                            <input type="hidden" name="id-mhs" value="<?= $row['id_mhs']?>">
                                            <input type="hidden" name="noreg" value="<?= $row['noreg']?>">
                                            <button type="submit" name="hapus-mhsWisuda" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                        </form></td>
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