<?php include('config.php');
$nim_p = $_GET['nim'];
$jns_dsn = $_GET['dsn'];
$sql_cmnt = "select comment from proposal where nim='$nim_p'";
$query_cmnt = mysqli_query($koneksi, $sql_cmnt);
$data_cmnt = mysqli_fetch_assoc($query_cmnt);
$nama = $_SESSION['nama'];
$id_dosen = $_SESSION['id_dosen'];
$sql_proposal = "select * from proposal where nim='$nim_p'";
$query_proposal = mysqli_query($koneksi, $sql_proposal);
$data_prop = mysqli_fetch_array($query_proposal);
$sql_proposal1 = "select * from proposal_dpen1 where nim='$nim_p'";
$query_proposal1 = mysqli_query($koneksi, $sql_proposal1);
$data_prop1 = mysqli_fetch_array($query_proposal1);
$sql_proposal2 = "select * from proposal_dpen2 where nim='$nim_p'";
$query_proposal2 = mysqli_query($koneksi, $sql_proposal2);
$data_prop2 = mysqli_fetch_array($query_proposal2);
$sql_proposal3 = "select * from proposal_dpen3 where nim='$nim_p'";
$query_proposal3 = mysqli_query($koneksi, $sql_proposal3);
$data_prop3 = mysqli_fetch_array($query_proposal3);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div style="text-align: center;"><span style="font-size: x-large; ">Tampil Proposal</span></div>
<hr>
<div class="container-fluid">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <?php
            $dirproposal = 'proposal';
            $folder = '../file/' . $nim_p . '/' . $dirproposal;
            $sql_p = "SELECT proposal FROM upload_berkas WHERE nim = '$nim_p'";
            $query_p = mysqli_query($koneksi, $sql_p);
            $info_p = mysqli_fetch_array($query_p);
            $file = $folder . '/' . $info_p['proposal'];
            if (file_exists($file)) {
                echo '
                            <div style="text-align: center;">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proposal</div>
                            </div>
							<div>
                                <div class="embed-responsive embed-responsive-21by9" style="text-align: center;">
                                <iframe class="embed-responsive-item" src="' . $file . '"></iframe>
                                 </div>
								<div style="text-align: center; margin-top: 30px">
								    <a href="' . $file . '" target="_blank"><button class="btn btn-success">View pdf</button></a>
                                </div>
                            </div>
                                ';
            } else {
                echo '
                                <div style="text-align: center;">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proposal</div>
                                </div>
							    <div style="text-align: center; margin-top: 50px;">
                                    <span style="font-size: large; ">File Tidak Ditemukan</span>
                                </div>
                                ';
            }
            ?>
        </div>
    </div>
    <?php if ($jns_dsn === 'dp1') { ?>
        <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
            <div class="card-body">
                <form action="" method="post" id="nilaiform">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Krekterian Penilaian</th>
                                <th>indikator Penilaian</th>
                                <th>Bobot (%)</th>
                                <th>Skor</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>Perumusan Masalah</td>
                                <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                                <td>30%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai1"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                               length="5" value="<?php echo $data_prop['nilai1']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Manfaat hasil Penelitian</td>
                                <td>Pengembanagan Iptek, pembangunan dll</td>
                                <td>20%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai2"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                               length="5" value="<?php echo $data_prop['nilai2']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tujuan Pustaka</td>
                                <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai3"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                               length="5" value="<?php echo $data_prop['nilai3']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Metode Penelitian</td>
                                <td>Ketetapan Metode Yang digunakan</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai4"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                               length="5" value="<?php echo $data_prop['nilai4']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>TOTAL NILAI</td>
                                <td></td>
                                <td>100%</td>
                                <td></td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_total"
                                               length="5" value="<?php echo $data_prop['nilai_hsl']; ?>" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                               length="5" value="<?php echo $data_prop['ket']; ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="result">
                        </div>
                    </div>
                    <div style="text-align: right; margin-top: 20px">
                        <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <form id="komen"
                      action="index.php?page=aksi_stat_cmnt&dsn=<?php echo $jns_dsn; ?>&nim=<?php echo $nim_p; ?>"
                      method="post">
                    <h1 style="margin-bottom: 20px"> Komentar </h1>
                    <textarea name="pesan" class="ckeditor"><?= $data_prop['comment'] ?></textarea>
                    <br>
                    <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    <?php } elseif ($jns_dsn === 'dpen1') { ?>
        <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
            <div class="card-body">
                <form action="" method="post" id="nilaiform">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Krekterian Penilaian</th>
                                <th>indikator Penilaian</th>
                                <th>Bobot (%)</th>
                                <th>Skor</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>Perumusan Masalah</td>
                                <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                                <td>30%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai1"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                               length="5" value="<?php echo $data_prop1['nilai1']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Manfaat hasil Penelitian</td>
                                <td>Pengembanagan Iptek, pembangunan dll</td>
                                <td>20%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai2"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                               length="5" value="<?php echo $data_prop1['nilai2']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tujuan Pustaka</td>
                                <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai3"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                               length="5" value="<?php echo $data_prop1['nilai3']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Metode Penelitian</td>
                                <td>Ketetapan Metode Yang digunakan</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai4"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                               length="5" value="<?php echo $data_prop1['nilai4']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>TOTAL NILAI</td>
                                <td></td>
                                <td>100%</td>
                                <td></td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_total"
                                               length="5" value="<?php echo $data_prop1['nilai_hsl']; ?>" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                               length="5" value="<?php echo $data_prop1['ket']; ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="result">
                        </div>
                    </div>
                    <div style="text-align: right; margin-top: 20px">
                        <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <form id="komen"
                      action="index.php?page=aksi_stat_cmnt&dsn=<?php echo $jns_dsn; ?>&nim=<?php echo $nim_p; ?>"
                      method="post">
                    <h1 style="margin-bottom: 20px"> Komentar </h1>
                    <textarea name="pesan" class="ckeditor"><?= $data_prop1['comment'] ?></textarea>
                    <br>
                    <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    <?php } elseif ($jns_dsn === 'dpen2') { ?>
        <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
            <div class="card-body">
                <form action="" method="post" id="nilaiform">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Krekterian Penilaian</th>
                                <th>indikator Penilaian</th>
                                <th>Bobot (%)</th>
                                <th>Skor</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>Perumusan Masalah</td>
                                <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                                <td>30%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai1"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                               length="5" value="<?php echo $data_prop2['nilai1']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Manfaat hasil Penelitian</td>
                                <td>Pengembanagan Iptek, pembangunan dll</td>
                                <td>20%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai2"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                               length="5" value="<?php echo $data_prop2['nilai2']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tujuan Pustaka</td>
                                <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai3"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                               length="5" value="<?php echo $data_prop2['nilai3']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Metode Penelitian</td>
                                <td>Ketetapan Metode Yang digunakan</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai4"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                               length="5" value="<?php echo $data_prop2['nilai4']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>TOTAL NILAI</td>
                                <td></td>
                                <td>100%</td>
                                <td></td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_total"
                                               length="5" value="<?php echo $data_prop2['nilai_hsl']; ?>" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                               length="5" value="<?php echo $data_prop2['ket']; ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="result">
                        </div>
                    </div>
                    <div style="text-align: right; margin-top: 20px">
                        <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <form id="komen"
                      action="index.php?page=aksi_stat_cmnt&dsn=<?php echo $jns_dsn; ?>&nim=<?php echo $nim_p; ?>"
                      method="post">
                    <h1 style="margin-bottom: 20px"> Komentar </h1>
                    <textarea name="pesan" class="ckeditor"><?= $data_prop2['comment'] ?></textarea>
                    <br>
                    <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    <?php } elseif ($jns_dsn === 'dpen3') { ?>
        <div class="card border-left-success shadow h-100 py-2" style="margin-top: 50px; margin-bottom: 50px">
            <div class="card-body">
                <form action="" method="post" id="nilaiform">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Krekterian Penilaian</th>
                                <th>indikator Penilaian</th>
                                <th>Bobot (%)</th>
                                <th>Skor</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>Perumusan Masalah</td>
                                <td>Ketajaman Perumusan Masalah dan Tujuan Penelitian</td>
                                <td>30%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai1"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai1"
                                               length="5" value="<?php echo $data_prop3['nilai1']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Manfaat hasil Penelitian</td>
                                <td>Pengembanagan Iptek, pembangunan dll</td>
                                <td>20%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai2"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai2"
                                               length="5" value="<?php echo $data_prop3['nilai2']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tujuan Pustaka</td>
                                <td>Relevansi,Kemutakhiran dan Penyusun Daftar Pustaka</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai3"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai3"
                                               length="5" value="<?php echo $data_prop3['nilai3']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Metode Penelitian</td>
                                <td>Ketetapan Metode Yang digunakan</td>
                                <td>25%</td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive validatefield"
                                               id="input_nilai4"
                                               length="5">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_nilai4"
                                               length="5" value="<?php echo $data_prop3['nilai4']; ?>" disabled>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>TOTAL NILAI</td>
                                <td></td>
                                <td>100%</td>
                                <td></td>
                                <td>
                                    <div class="col-md-5 col-sm-6">
                                        <input type="text" class="form-control form-responsive" id="hasil_total"
                                               length="5" value="<?php echo $data_prop3['nilai_hsl']; ?>" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control form-keterangan" id="ket_nilai"
                                               length="5" value="<?php echo $data_prop3['ket']; ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="result">
                        </div>
                    </div>
                    <div style="text-align: right; margin-top: 20px">
                        <button class="btn btn-primary" id="submit" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <form id="komen"
                      action="index.php?page=aksi_stat_cmnt&dsn=<?php echo $jns_dsn; ?>&nim=<?php echo $nim_p; ?>"
                      method="post">
                    <h1 style="margin-bottom: 20px"> Komentar </h1>
                    <textarea name="pesan" class="ckeditor"><?= $data_prop3['comment'] ?></textarea>
                    <br>
                    <button class="btn btn-primary" name="kirim" value="kirim" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    <?php } ?>


</div>
<script type="text/javascript">
    $(document).ready(function () {
        var total1;
        var total2;
        var total3;
        var total4;
        var total_nilai;
        var keterangan;

        $('#input_nilai1').keyup(function (ev1) {
            if ($(this).val() > 5 || $(this).val() < 0) {
                alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
                $(this).val('0');
            } else {
                total1 = $('#input_nilai1').val() * 0.3;
                $('#hasil_nilai1').val(total1);
                total_nilai = $('#input_nilai1').val() * 0.3 + $('#input_nilai2').val() * 0.2 + $('#input_nilai3').val() * 0.25 + $('#input_nilai4').val() * 0.25;
                $('#hasil_total').val(total_nilai);
                if (total_nilai >= 1 && total_nilai < 1.5) {
                    keterangan = 'Kurang Baik';
                } else if (total_nilai >= 1.5 && total_nilai < 2.5) {
                    keterangan = 'Kurang';
                } else if (total_nilai >= 2.5 && total_nilai < 3.5) {
                    keterangan = 'Cukup';
                } else if (total_nilai >= 3.5 && total_nilai < 4.5) {
                    keterangan = 'Baik';
                } else if (total_nilai >= 4.5 && total_nilai <= 5) {
                    keterangan = 'Sangat Baik';
                }
                $('#ket_nilai').val(keterangan);
            }
        });
        $('#input_nilai2').keyup(function (ev2) {
            if ($(this).val() > 5 || $(this).val() < 0) {
                alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
                $(this).val('0');
            } else {
                total2 = $('#input_nilai2').val() * 0.2;
                $('#hasil_nilai2').val(total2);
                total_nilai = $('#input_nilai1').val() * 0.3 + $('#input_nilai2').val() * 0.2 + $('#input_nilai3').val() * 0.25 + $('#input_nilai4').val() * 0.25;
                $('#hasil_total').val(total_nilai);
                if (total_nilai >= 1 && total_nilai < 1.5) {
                    keterangan = 'Kurang Baik';
                } else if (total_nilai >= 1.5 && total_nilai < 2.5) {
                    keterangan = 'Kurang';
                } else if (total_nilai >= 2.5 && total_nilai < 3.5) {
                    keterangan = 'Cukup';
                } else if (total_nilai >= 3.5 && total_nilai < 4.5) {
                    keterangan = 'Baik';
                } else if (total_nilai >= 4.5 && total_nilai <= 5) {
                    keterangan = 'Sangat Baik';
                }
                $('#ket_nilai').val(keterangan);
            }
        });
        $('#input_nilai3').keyup(function (ev3) {
            if ($(this).val() > 5 || $(this).val() < 0) {
                alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
                $(this).val('0');
            } else {
                total3 = $('#input_nilai3').val() * 0.25;
                $('#hasil_nilai3').val(total3);
                total_nilai = $('#input_nilai1').val() * 0.3 + $('#input_nilai2').val() * 0.2 + $('#input_nilai3').val() * 0.25 + $('#input_nilai4').val() * 0.25;
                $('#hasil_total').val(total_nilai);
                if (total_nilai >= 1 && total_nilai < 1.5) {
                    keterangan = 'Kurang Baik';
                } else if (total_nilai >= 1.5 && total_nilai < 2.5) {
                    keterangan = 'Kurang';
                } else if (total_nilai >= 2.5 && total_nilai < 3.5) {
                    keterangan = 'Cukup';
                } else if (total_nilai >= 3.5 && total_nilai < 4.5) {
                    keterangan = 'Baik';
                } else if (total_nilai >= 4.5 && total_nilai <= 5) {
                    keterangan = 'Sangat Baik';
                }
                $('#ket_nilai').val(keterangan);
            }
        });
        $('#input_nilai4').keyup(function (ev4) {
            if ($(this).val() > 5 || $(this).val() < 0) {
                alert("Tidak Boleh Lebih Dari 5 Atau Kurang Dari 0!");
                $(this).val('0');
            } else {
                total4 = $('#input_nilai4').val() * 0.25;
                $('#hasil_nilai4').val(total4);
                total_nilai = $('#input_nilai1').val() * 0.3 + $('#input_nilai2').val() * 0.2 + $('#input_nilai3').val() * 0.25 + $('#input_nilai4').val() * 0.25;
                $('#hasil_total').val(total_nilai);
                if (total_nilai >= 1 && total_nilai < 1.5) {
                    keterangan = 'Kurang Baik';
                } else if (total_nilai >= 1.5 && total_nilai < 2.5) {
                    keterangan = 'Kurang';
                } else if (total_nilai >= 2.5 && total_nilai < 3.5) {
                    keterangan = 'Cukup';
                } else if (total_nilai >= 3.5 && total_nilai < 4.5) {
                    keterangan = 'Baik';
                } else if (total_nilai >= 4.5 && total_nilai <= 5) {
                    keterangan = 'Sangat Baik';
                }
                $('#ket_nilai').val(keterangan);
            }
        });

        $('#nilaiform').submit(function () {

            // Get the Login Name value and trim it
            var input1 = $.trim($('#input_nilai1').val());
            var input2 = $.trim($('#input_nilai2').val());
            var input3 = $.trim($('#input_nilai3').val());
            var input4 = $.trim($('#input_nilai4').val());

            // Check if empty of not
            if (input1 == '' || input2 == '' || input3 == '' || input4 == '') {
                alert('NILAI SKOR TIDAK BOLEH KOSONG!');
                return false;
            } else {
                $.ajax
                ({
                    url: "index.php?page=post_proposal&dsn=<?php echo $jns_dsn;?>&nim=<?php echo $nim_p; ?>",
                    type: "POST",
                    data: {
                        hasil_nilai1: total1,
                        hasil_nilai2: total2,
                        hasil_nilai3: total3,
                        hasil_nilai4: total4,
                        hasil_total: total_nilai,
                        keterangan: keterangan
                    }
                });
            }
        });
    });
</script>
